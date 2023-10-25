<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyLevelPrice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['days'];
    protected $casts = [ 'start_date'=>'date', 'end_date'=>'date'];

    public function getDaysAttribute()
    {
        return date_diff( $this->end_date , date_create(date('Y-m-d')) )->days;
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}