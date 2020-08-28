<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static New()
 * @method static static In_progress()
 * @method static static Done()
 */
final class TasksStatus extends Enum
{
    const New = 0;
    const In_progress = 1;
    const Done = 2;
}
