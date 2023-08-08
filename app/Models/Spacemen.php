<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    // Get all of the test_requsets for the Patient
    public function test_requsets(): HasMany
    {
        return $this->hasMany(TestRequst::class);
    }
}
