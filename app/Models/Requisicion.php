<?php
// app/Models/Requisicion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requisicion extends Model
{
    protected $table = 'requisiciones';
    protected $primaryKey = 'idRequisicion';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'estado',
    ];

    /**
     * Una requisición tiene muchos ítems.
     */
    public function items(): HasMany
    {
        return $this->hasMany(ItemRequisicion::class, 'idRequisicion', 'idRequisicion');
    }
}
