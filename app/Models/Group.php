<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function studentGroups()
    {
        return $this->hasMany(StudentGroup::class);
    }
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}