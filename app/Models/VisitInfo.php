<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisitInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'visit_date',
        'age',
        'temperature',
        'weight',
        'height'
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    //Get the patient that owns the visit_info
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
