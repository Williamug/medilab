<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $with = ['next_of_kin'];

    protected $fillable = [
        'user_id',
        'next_of_kin_id',
        'registration_number',
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
    public function ageFromDob(): Attribute
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

    // get a corresponding visit information
    public function visit_info(): HasOne
    {
        return $this->hasOne(VisitInfo::class);
    }

    public function next_of_kin(): BelongsTo
    {
        return $this->belongsTo(NextOfKin::class);
    }

    public function test_results(): HasMany
    {
        return $this->hasMany(TestResult::class);
    }
}
