<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRequst extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'test_service_id', 'spacemen_id', 'result_id'];

    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('patient_id', 'like', '%' . $query . '%');
    }
}
