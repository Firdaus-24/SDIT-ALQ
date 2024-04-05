<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrestasiDetail extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class, 'prestasi_id', 'id');
    }
}
