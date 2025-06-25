<?php
// app/Models/Material.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $table      = 'materiales';
    protected $primaryKey = 'codigo';
    public    $timestamps = false;

    protected $fillable = [
        'unidadMedida',
        'descripcion',
        'ubicacion',
        'idCategoria',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'idCategoria', 'idCategoria');
    }
}
