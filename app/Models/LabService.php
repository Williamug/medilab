<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['service_name', 'user_id'];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('service_name', 'like', '%' . $query . '%');
    }
}
