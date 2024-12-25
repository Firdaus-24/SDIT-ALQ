<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory, Uuids;
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
