<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'school',
        'degree',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'grade',
        'description',
        'sort',
        'resume_id',
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
