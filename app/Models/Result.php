<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['result', 'code', 'symbol', 'test_service_id', 'user_id'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('result', 'like', '%' . $query . '%')
            ->orWhere('code', 'like', '%' . $query . '%');
    }
}
