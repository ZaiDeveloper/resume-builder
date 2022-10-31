<?php

namespace App\Models;

use App\Enums\Resume\{ResumeStatus, ResumeTemplate};
use App\ModelFilters\ResumeFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Resume extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'unique_link',
        'title',
        'name',
        'phone',
        'email',
        'avatar',
        'template',
        'status',
        'user_id',
    ];

    protected $casts = [
        'template' => ResumeTemplate::class,
        'status' => ResumeStatus::class,
    ];

    public function modelFilter()
    {
        return $this->provideFilter(ResumeFilter::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class)->orderBy('sort', 'ASC');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class)->orderBy('sort', 'ASC');
    }

    public function experince(): HasOne
    {
        return $this->hasOne(Experience::class);
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class);
    }
}
