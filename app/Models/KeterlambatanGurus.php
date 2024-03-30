<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeterlambatanGurus extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];
    protected $table = 'keterlambatan_gurus';

    function teacher()
    {
        return $this->belongsTo(Teachers::class, 'teacher_id', 'id');
    }

    function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jab_id', 'id');
    }
}
