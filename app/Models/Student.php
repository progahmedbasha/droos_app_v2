<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function getImageAttribute()
    {
        return 'data/dashboard/students';
    }
    public function scopeWhenSearch($query,$search){
          return $query->when($search,function($q)use($search){
              return $q->where('barcode',$search)
                  ->orWhere('name','like',"%$search%")
                  ->orWhere('phone','like',"%$search%");
          });
        }
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'student_groups', 'student_id', 'group_id');
    }
    public function studentGroups()
    {
        return $this->hasMany(StudentGroup::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'attendances', 'student_id', 'class_id');
    }
}