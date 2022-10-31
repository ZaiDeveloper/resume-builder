<?php

namespace App\DTO\Education;

use Spatie\LaravelData\Data;

class EducationUpdateDTO extends Data
{
    public function __construct(
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
