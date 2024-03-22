<?php

namespace App\Models;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teachers extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jab_id', 'id');
    }
}
