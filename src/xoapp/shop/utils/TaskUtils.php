<?php

namespace xoapp\shop\utils;

use Closure;
use xoapp\shop\Loader;

class TaskUtils
{
    public static function submitDelayed(Closure $task, int $delay = 20): void
    {
        Loader::getInstance()->getScheduler()->scheduleDelayedTask($task, $delay);
    }
}