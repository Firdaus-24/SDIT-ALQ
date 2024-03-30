<?php

namespace App\Models;

use App\Models\Teachers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Teachers()
    {
        return $this->hasMany(Teachers::class, 'id', 'jab_id');
    }

    function keterlambatanGuru()
    {
        return $this->hasMany(KeterlambatanGurus::class, 'id', 'jab_id');
    }
}
