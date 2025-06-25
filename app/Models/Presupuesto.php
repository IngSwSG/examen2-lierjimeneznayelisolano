<?php
// app/Models/Presupuesto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'codigoPresupuesto';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nombrePresupuesto',
    ];

    /**
     * Un presupuesto puede aplicarse a muchas MaterialUnidad.
     */
    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
