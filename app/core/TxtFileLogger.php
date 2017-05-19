<?php

namespace App\Core;


use App\Interfaces\LoggerInterface;

class TxtFileLogger implements LoggerInterface
{
    private $fileName;

    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }


    public function log(string $message)
    {
        file_put_contents($this->fileName, PHP_EOL . '[ERROR] - ' . date('Y-m-d H:i:s') . ': ' . $message, FILE_APPEND);
    }
}