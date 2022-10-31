<?php

namespace App\DTO\Experience;

use App\Enums\Experience\ExperienceCurrentlyWorking;
use App\Enums\Experience\ExperienceEmploymentType as ExperienceExperienceEmploymentType;
use App\Enums\Resume\{ExperienceEmploymentType};
use BenSampo\Enum\Rules\EnumValue;
use Spatie\LaravelData\Data;

class ExperienceStoreDTO extends Data
{
    public function __construct(
        public int $resume_id,
        public string $title,
        public string $company_name,
        public string $location,
        public ?int $currently_working,
        public int $employment_type,
        public string $start_month,
        public int $start_year,
        public ?string $end_month,
        public ?int $end_year,
        public string $description,
        public int $sort,

    ) {
    }

    public static function rules(): array
    {
        return [
            'resume_id' => 'required|integer|exists:resumes,id|bail',
            'title' => 'required|string|bail',
            'company_name' => 'required|string|bail',
            'location' => 'required|string|bail',
            'start_month' => 'required|string|bail',
            'start_year' => 'required|integer|bail',
            'end_month' => !request()->currently_working ? 'required|string|bail' : 'nullable|string|bail',
            'end_year' => !request()->currently_working ? 'required|string|bail' : 'nullable|string|bail',
            'description' => 'required|string|bail',
            'sort' => 'required|integer|bail',
            'currently_working' => ['nullable', 'integer', new EnumValue(ExperienceCurrentlyWorking::class, false), 'bail'],
            'employment_type' => ['required', 'integer', new EnumValue(ExperienceExperienceEmploymentType::class, false), 'bail'],
        ];
    }
}
