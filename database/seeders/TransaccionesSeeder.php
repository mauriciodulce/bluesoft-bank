<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaccion;

class TransaccionesSeeder extends Seeder
{
    public function run()
    {
        Transaccion::create([
            'cuenta_id' => 1,
            'tipo_transaccion' => 'consignacion',
            'monto' => 200.00,
            'ciudad' => 'Bogotá',
        ]);

        Transaccion::create([
            'cuenta_id' => 1,
            'tipo_transaccion' => 'retiro',
            'monto' => 50.00,
            'ciudad' => 'Bogotá',
        ]);

        Transaccion::create([
            'cuenta_id' => 2,
            'tipo_transaccion' => 'consignacion',
            'monto' => 300.00,
            'ciudad' => 'Medellín',
        ]);

        Transaccion::create([
            'cuenta_id' => 2,
            'tipo_transaccion' => 'retiro',
            'monto' => 100.00,
            'ciudad' => 'Medellín',
        ]);
    }
}
