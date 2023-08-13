<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'patient_id', 'lab_service_id', 'spacemen_id', 'result_option_id', 'test_identity', 'comment'];
}
