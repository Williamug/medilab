<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;

    protected $fillable = ['catagory_name', 'description'];

    public static function search($query)
    {
        // filter results based on category name
        return empty($query)
            ? static::query()
            : static::where('catagory_name', 'like', '%' . $query . '%');
    }
}
