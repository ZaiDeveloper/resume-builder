<?php

namespace App\DTO\Resume;

use App\Enums\Resume\{ResumeStatus, ResumeTemplate};
use BenSampo\Enum\Rules\EnumValue;
use Spatie\LaravelData\Data;

class ResumeStoreDTO extends Data
{
    public function __construct(
        public ?string $unique_link,
        public string $title,
        public string $name,
        public string $phone,
        public string $email,
        public ?object $avatar = null,
        public int $template,
        public int $status,
    ) {
    }

    public static function rules(): array
    {
        return [
            'unique_link' => 'nullable|string|unique:resumes,unique_link|bail',
            'title' => 'required|string|unique:resumes,title|bail',
            'name' => 'required|string|bail',
            'phone' => 'required|string|bail',
            'email' => 'required|email|bail',
            'avatar' => 'required|image|mimes:png,jpg,jpeg|max:2048|bail',
            'template' => ['required', 'integer', new EnumValue(ResumeTemplate::class, false), 'bail'],
            'status' => ['required', 'integer', new EnumValue(ResumeStatus::class, false), 'bail'],
        ];
    }
}
