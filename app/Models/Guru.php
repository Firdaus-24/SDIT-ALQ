<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jab_id', 'id');
    }
    function keterlambatanGurus()
    {
        return $this->hasMany(KeterlambatanGurus::class, 'id', 'guru_id');
    }
}
