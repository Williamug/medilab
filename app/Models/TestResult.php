<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // eager load models 
    protected $with = ['lab_service', 'spacemens'];

    protected $casts = [
        'order_received_date' => 'datetime'
    ];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('test_identity', 'like', '%' . $query . '%');
    }


    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function lab_service(): BelongsTo
    {
        return $this->belongsTo(LabService::class);
    }

    public function spacemens(): BelongsToMany
    {
        return $this->belongsToMany(Spacemen::class);
    }
}
