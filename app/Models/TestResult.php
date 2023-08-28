<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestResult extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('test_identity', 'like', '%' . $query . '%');
    }

    public function test_order(): BelongsTo
    {
        return $this->belongsTo(TestOrder::class);
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
