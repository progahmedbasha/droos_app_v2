<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_id');
    }
}