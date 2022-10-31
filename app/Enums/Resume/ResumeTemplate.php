<?php

declare(strict_types=1);

namespace App\Enums\Resume;

use BenSampo\Enum\Enum;

/**
 * @method static static Basic()
 * @method static static Premium()
 * @method static static Superb()
 */
final class ResumeTemplate extends Enum
{
    const Basic = 0;
    const Premium = 1;
}
