<?php

declare(strict_types=1);

namespace App\Enums\Experience;

use BenSampo\Enum\Enum;

/**
 * @method static static FullTime()
 * @method static static PartTime()
 * @method static static SelfEmployed()
 * @method static static Freelance()
 * @method static static Contract()
 * @method static static Internship()
 * @method static static Seasonal()
 */
final class ExperienceEmploymentType extends Enum
{
    const FullTime = 0;
    const PartTime = 1;
    const SelfEmployed = 2;
    const Freelance = 3;
    const Contract = 4;
    const Internship = 5;
    const Seasonal = 6;
}
