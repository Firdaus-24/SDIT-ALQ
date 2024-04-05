<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function prestasiDetail()
    {
        return $this->hasMany(PrestasiDetail::class, 'id', 'student_id');
    }
    public function kesalahanDetail()
    {
        return $this->hasMany(kesalahanDetail::class, 'id', 'student_id');
    }
}
