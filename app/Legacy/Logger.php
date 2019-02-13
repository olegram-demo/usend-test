<?php

namespace App\Legacy;

/**
 * logger which not implements psr-3 interface is legacy too
 *
 * Class Logger
 * @package App\Legacy
 */
class Logger
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * Logger constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @param string $message
     * @return Void
     */
    public function log(string $message): Void
    {
        file_put_contents($this->filename, $message.PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}