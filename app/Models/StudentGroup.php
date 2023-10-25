<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
     public function getInvoicesAttribute()
    {
        return Invoice::where('student_id', $this->student->id)->get();
    }
}