<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prestasiDetail()
    {
        return $this->hasMany(PrestasiDetail::class, 'id', 'prestasi_id');
    }
}
