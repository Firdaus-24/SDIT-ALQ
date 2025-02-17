<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kesalahanDetail extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
    public function kesalahan()
    {
        return $this->belongsTo(Kesalahan::class, 'kesalahan_id', 'id');
    }
}
