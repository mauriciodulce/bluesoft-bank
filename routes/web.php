<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cuentas/consultar', [CuentaController::class, 'consultarSaldo'])->name('cuentas.consultar');
Route::post('/cuentas/consignar', [CuentaController::class, 'consignar'])->name('cuentas.consignar');
Route::post('/cuentas/retirar', [CuentaController::class, 'retirar'])->name('cuentas.retirar');
Route::get('/cuentas/movimientos', [CuentaController::class, 'movimientosRecientes'])->name('cuentas.movimientos');
Route::get('/cuentas/extracto', [CuentaController::class, 'generarExtractoMensual'])->name('cuentas.extracto');


Route::get('/reportes/transacciones-por-mes', [ReporteController::class, 'transaccionesPorMes'])->name('reportes.transacciones_por_mes');
Route::get('/reportes/retiros-fuera-de-ciudad', [ReporteController::class, 'retirosFueraDeCiudad'])->name('reportes.retiros_fuera_de_ciudad');
