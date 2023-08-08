<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'visit_date',
        'age',
        'temperature',
        'weight',
        'height'
    ];
}
