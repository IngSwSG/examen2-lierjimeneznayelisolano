<?php
// app/Models/MaterialUnidad.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialUnidad extends Model
{
    protected $table = 'material_unidades';
    protected $primaryKey = 'idMaterialUnidad';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'cantidad',
        'idUnidad',
        'idMaterial',
        'codigoPresupuesto', // si quieres asociarlo a un presupuesto, nullable
    ];

    /**
     * La relación al material.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'idMaterial', 'codigo');
    }

    /**
     * La relación a la unidad.
     */
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'idUnidad', 'idUnidad');
    }

    /**
     * La relación opcional al presupuesto.
     */
    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class, 'codigoPresupuesto', 'codigoPresupuesto');
    }
}
