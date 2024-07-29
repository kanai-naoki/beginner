<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date', 
        'attendance', 
        'leaving'
    ];

    public function attendance_id()
    {
        return $this->hasMany(Rest::class);
    }

    public function relation()
    {
        return $this->belongsTo(User::class);
    }
}
