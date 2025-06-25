<?php
// app/Models/Unidad.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $primaryKey = 'idUnidad';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
    ];

    /**
     * Una unidad puede vincularse a muchas MaterialUnidad.
     */
    public function materialUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'idUnidad', 'idUnidad');
    }
}
