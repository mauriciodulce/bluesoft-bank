<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cuenta extends Model
{
    protected $fillable = ['numero_cuenta', 'tipo_cuenta', 'saldo'];

    public function transacciones(): HasMany
    {
        return $this->hasMany(Transaccion::class);
    }

    public function consignar(float $monto): void
    {
        $this->saldo += $monto;
        $this->save();
    }

    public function retirar(float $monto): bool
    {
        if ($this->saldo >= $monto) {
            $this->saldo -= $monto;
            $this->save();
            return true;
        }
        return false;
    }
}
