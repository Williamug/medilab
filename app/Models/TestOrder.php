<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestOrder extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('order_number', 'like', '%' . $query . '%');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function lab_service(): BelongsTo
    {
        return $this->belongsTo(LabService::class);
    }
}
