<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory, Uuids;
    protected $guarded = [];

    // public function prestasiDetail()
    // {
    //     return $this->hasMany(PrestasiDetail::class, 'id', 'siswa_id');
    // }
    // public function kesalahanDetail()
    // {
    //     return $this->hasMany(kesalahanDetail::class, 'id', 'siswa_id');
    // }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }
}
