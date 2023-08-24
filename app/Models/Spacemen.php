<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spacemen extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('spacemen', 'like', '%' . $query . '%');
    }
}
