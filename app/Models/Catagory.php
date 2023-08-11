<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catagory extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = ['user_id', 'catagory_name', 'description'];

    public static function search($query)
    {
        // filter results based on category name
        return empty($query)
            ? static::query()
            : static::where('catagory_name', 'like', '%' . $query . '%');
    }

    // Get all of the test_services for the category
    public function test_services(): HasMany
    {
        return $this->hasMany(TestService::class);
    }
}
