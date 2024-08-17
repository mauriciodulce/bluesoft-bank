<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;
use App\Models\Transaccion;

class CuentaController extends Controller
{
    public function consultarSaldo(Request $request)
    {
        $numeroCuenta = $request->input('numero');
        $cuenta = Cuenta::where('numero_cuenta', $numeroCuenta)->first();

        if ($cuenta) {
            return view('cuenta', ['saldo' => $cuenta->saldo]);
        } else {
            return view('cuenta', ['error' => 'Cuenta no encontrada']);
        }
    }

    public function consignar(Request $request)
    {
        $numeroCuenta = $request->input('numero');
        $monto = $request->input('monto');
        $cuenta = Cuenta::where('numero_cuenta', $numeroCuenta)->first();

        if ($cuenta) {
            $cuenta->saldo += $monto;
            $cuenta->save();

            Transaccion::create([
                'cuenta_id' => $cuenta->id,
                'tipo_transaccion' => 'consignacion',
                'monto' => $monto,
            ]);

            return view('cuenta', ['status' => 'Consignación exitosa']);
        } else {
            return view('cuenta', ['error' => 'Cuenta no encontrada']);
        }
    }

    public function retirar(Request $request)
    {
        $numeroCuenta = $request->input('numero');
        $monto = $request->input('monto');
        $cuenta = Cuenta::where('numero_cuenta', $numeroCuenta)->first();

        if ($cuenta) {
            if ($cuenta->saldo >= $monto) {
                $cuenta->saldo -= $monto;
                $cuenta->save();

                Transaccion::create([
                    'cuenta_id' => $cuenta->id,
                    'tipo_transaccion' => 'retiro',
                    'monto' => $monto,
                ]);

                return view('cuenta', ['status' => 'Retiro exitoso']);
            } else {
                return view('cuenta', ['error' => 'Saldo insuficiente']);
            }
        } else {
            return view('cuenta', ['error' => 'Cuenta no encontrada']);
        }
    }

    public function movimientosRecientes(Request $request)
    {
        $numeroCuenta = $request->input('numero');
        $cuenta = Cuenta::where('numero_cuenta', $numeroCuenta)->first();

        if ($cuenta) {
            $transacciones = Transaccion::where('cuenta_id', $cuenta->id)->orderBy('created_at', 'desc')->take(10)->get();
            return view('movimientos', ['transacciones' => $transacciones]);
        } else {
            return view('movimientos', ['error' => 'Cuenta no encontrada']);
        }
    }

    public function generarExtractoMensual(Request $request)
    {
        $numeroCuenta = $request->input('numero');
        $cuenta = Cuenta::where('numero_cuenta', $numeroCuenta)->first();

        if ($cuenta) {
            $transacciones = Transaccion::where('cuenta_id', $cuenta->id)
                ->whereMonth('created_at', now()->month)
                ->get();
            return view('extracto', ['transacciones' => $transacciones]);
        } else {
            return view('extracto', ['error' => 'Cuenta no encontrada']);
        }
    }
}
