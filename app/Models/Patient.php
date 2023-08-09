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
        'full_name',
        'phone_number',
        'gender',
        'birth_date',
        'residence'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    //Accessor for Age.
    public function age(): Attribute
    {
        return new Attribute(
            get: fn () => Carbon::parse($this->attributes['birth_date'])->age
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
