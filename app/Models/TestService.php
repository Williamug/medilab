<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestService extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_name',
        'price',
        'user_id',
        'result_id'
    ];

    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('test_name', 'like', '%' . $query . '%');
    }
}
