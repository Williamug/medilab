<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'gender',
        'birth_date',
        'residence'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('full_name', 'like', '%' . $query . '%')
            ->orWhere('gender', 'like', '%' . $query . '%')
            ->orWhere('birth_date', 'like', '%' . $query . '%');
    }
}
