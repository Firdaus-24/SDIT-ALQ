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

    function user()
    {
        return $this->hasOne(User::class, 'id', 'guru_id');
    }
}
