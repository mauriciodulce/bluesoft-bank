<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Transaccion;
use DB;

class ReporteController extends Controller
{
    public function transaccionesPorMes(Request $request)
    {
        $mes = $request->input('mes');
        $transacciones = DB::table('transacciones')
            ->select('cuentas.numero_cuenta', DB::raw('count(transacciones.id) as total_transacciones'))
            ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
            ->whereMonth('transacciones.created_at', $mes)
            ->groupBy('cuentas.numero_cuenta')
            ->orderBy('total_transacciones', 'desc')
            ->get();

        return view('reportes.transacciones_por_mes', ['transacciones' => $transacciones]);
    }

    public function retirosFueraDeCiudad(Request $request)
    {
        $retiros = DB::table('transacciones')
            ->select('cuentas.numero_cuenta', DB::raw('sum(transacciones.monto) as total_retiros'))
            ->join('cuentas', 'transacciones.cuenta_id', '=', 'cuentas.id')
            ->where('transacciones.tipo_transaccion', 'retiro')
            ->where('transacciones.ciudad', '!=', DB::raw('cuentas.ciudad'))
            ->groupBy('cuentas.numero_cuenta')
            ->havingRaw('sum(transacciones.monto) > 1000000')
            ->get();

        return view('reportes.retiros_fuera_de_ciudad', ['retiros' => $retiros]);
    }
}
