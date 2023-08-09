<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestRequst extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'test_service_id', 'spacemen_id', 'result_id'];

    // search records from the database
    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('patient_id', 'like', '%' . $query . '%');
    }

    //Get the patient that owns the TestRequst
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    //Get the test_service that owns the TestRequst
    public function test_service(): BelongsTo
    {
        return $this->belongsTo(TestService::class);
    }

    //Get the spacemen that owns the TestRequst
    public function spacemen(): BelongsTo
    {
        return $this->belongsTo(Spacemen::class);
    }
    
    //Get the result that owns the TestRequst
    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }
}
