<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NextOfKin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'patient_id',
        'name',
        'gender',
        'phone_number',
        'email',
        'residence',
        'relationship_to_patient',
    ];
}
