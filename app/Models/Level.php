<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function monthlyLevelPrices()
    {
        return $this->hasMany(MonthlyLevelPrice::class);
    }

//test
    // public function invoices()
    // {
    //     return $this->belongsToMany(Invoice::class, 'groups', 'group_id', 'invoice_id');
    // }
}