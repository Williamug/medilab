<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spacemen extends Model
{
    use HasFactory;

    protected $fillable = ['spacemen', 'user_id'];

    public static function search($query)
    {
        // filter results based on test name
        return empty($query)
            ? static::query()
            : static::where('spacemen', 'like', '%' . $query . '%');
    }
}
