<?php

namespace App\Models;

use App\Enums\Experience\{ExperienceCurrentlyWorking, ExperienceEmploymentType};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'employment_type',
        'company_name',
        'location',
        'currently_working',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'description',
        'sort',
        'resume_id',
    ];

    protected $casts = [
        'employment_type' => ExperienceEmploymentType::class,
        'currently_working' => ExperienceCurrentlyWorking::class,
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
