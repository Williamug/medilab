<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function catagory(): BelongsTo
    {
        return $this->belongsTo(Catagory::class);
    }
}
