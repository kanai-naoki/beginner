<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rest extends Model
{
    use HasFactory;

    protected $fillable = [
        'rest_begin',
        'rest_after'
    ];

    public function relation()
    {
        return $this->belongsTo(Attendance::class);
    }
}
