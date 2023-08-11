<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    use HasFactory;

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
