<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
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
    public function monthlyLevelPrice()
    {
        return $this->belongsTo(MonthlyLevelPrice::class);
    }
}