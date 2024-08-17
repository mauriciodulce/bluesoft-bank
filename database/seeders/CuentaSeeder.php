<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuenta;

class CuentaSeeder extends Seeder
{
    public function run()
    {
        Cuenta::create([
            'numero_cuenta' => '1234567890',
            'tipo_cuenta' => 'ahorros',
            'saldo' => 1000.00,
        ]);

        Cuenta::create([
            'numero_cuenta' => '0987654321',
            'tipo_cuenta' => 'corriente',
            'saldo' => 500.00,
        ]);
    }
}
