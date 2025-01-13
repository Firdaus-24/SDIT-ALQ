<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenGuru extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
