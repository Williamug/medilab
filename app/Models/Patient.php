<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'date_of_birth',
        'age',
        'phone_number',
        'email',
        'residence',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    //Accessor for Age.
    public function age(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::parse($this->attributes['date_of_birth'])->age
        );
    }

    public static function search($query)
    {
        // filter results
        return empty($query)
            ? static::query()
            : static::where('full_name', 'like', '%' . $query . '%')
            ->orWhere('gender', 'like', '%' . $query . '%')
            ->orWhere('birth_date', 'like', '%' . $query . '%');
    }

    // Get all of the test_requsets for the Patient
    public function test_requsets(): HasMany
    {
        return $this->hasMany(TestRequst::class);
    }

    // get a corresponding visit information
    public function visit_info(): HasOne
    {
        return $this->hasOne(VisitInfo::class);
    }
}
