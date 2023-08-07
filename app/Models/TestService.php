<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestService extends Model
{
    use HasFactory;

    protected $with = ['catagory'];

    protected $fillable = [
        'test_name',
        'price',
        'user_id',
        'catagory_id'
    ];

    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('test_name', 'like', '%' . $query . '%');
    }

    //Get the category that owns the test_service
    public function catagory(): BelongsTo
    {
        return $this->belongsTo(Catagory::class);
    }

    // Get all of the test_requsets for the Patient
    public function test_requsets(): HasMany
    {
        return $this->hasMany(TestRequst::class);
    }
}
