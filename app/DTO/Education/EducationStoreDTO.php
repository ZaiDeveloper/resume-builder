<?php

namespace App\DTO\Education;

use Spatie\LaravelData\Data;

class EducationStoreDTO extends Data
{
    public function __construct(
        public int $resume_id,
        public string $school,
        public string $degree,
        public string $start_month,
        public int $start_year,
        public string $end_month,
        public int $end_year,
        public float $grade,
        public string $description,
        public int $sort,

    ) {
    }

    public static function rules(): array
    {
        return [
            'resume_id' => 'required|integer|exists:resumes,id|bail',
            'school' => 'required|string|bail',
            'degree' => 'required|string|bail',
            'start_month' => 'required|string|bail',
            'start_year' => 'required|integer|bail',
            'end_month' => 'required|string|bail',
            'end_year' => 'required|integer|bail',
            'description' => 'required|string|bail',
            'grade' => 'required|numeric|bail',
            'sort' => 'required|integer|bail',
        ];
    }
}
