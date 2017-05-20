<?php

namespace App\Core;


use App\Interfaces\LoggerInterface;

class TxtFileLogger implements LoggerInterface
{
    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = dirname(__DIR__) . '/logs/' . $fileName;
    }


    public function log(string $message)
    {
        file_put_contents($this->fileName, '[ERROR] - ' . date('Y-m-d H:i:s') . ': ' . $message . PHP_EOL, FILE_APPEND);
    }
}