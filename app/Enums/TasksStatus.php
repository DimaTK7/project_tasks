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
    const NEW = 'new';
    const PROGRESS = 'progress';
    const DONE = 'done';
}
