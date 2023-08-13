<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabServices extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['service_category'];

    protected $fillable = [
        'service_name',
        'price',
        'user_id',
        'service_category_id'
    ];

    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('test_name', 'like', '%' . $query . '%');
    }

    //Get the category that owns the test_service
    public function service_category(): BelongsTo
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    // Get all of the test_requsets for the Patient
    public function test_requsets(): HasMany
    {
        return $this->hasMany(TestRequst::class);
    }
}
