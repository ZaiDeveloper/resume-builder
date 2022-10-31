<?php

declare(strict_types=1);

namespace App\Enums\Resume;

use BenSampo\Enum\Enum;

/**
 * @method static static Unpublish()
 * @method static static Publish()
 */
final class ResumeStatus extends Enum
{
    const Unpublish = 0;
    const Publish = 1;
}
