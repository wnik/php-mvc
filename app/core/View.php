<?php

namespace App\Core;
use App\Interfaces\LoggerInterface;

/**
 * Class View
 * @package App\Core
 */
class View
{
       public function render(string $file, array $variables = array(), int $status = 200)
    {
        extract($variables);

        $filePath = dirname(__DIR__) . '/views/' . $file;

        if (file_exists($filePath))
        {
            http_response_code($status);

            require_once $filePath;
        }
        else
            throw new \Exception("View: $filePath not found");
    }
}