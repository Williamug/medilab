<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'temperature',
        'weight',
        'height',
    ];
}
