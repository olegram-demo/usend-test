<?php

namespace App\Loggers;

use App\Legacy\Logger;

class SimpleFileLogger extends Logger
{
    /**
     * @param string $message
     * @return void
     */
    public function log(string $message): void
    {
        if (env('ENABLE_LOGGER', false)) {
            parent::log('['. now()->toIso8601String() . '] ' . $message);
        }
    }
}