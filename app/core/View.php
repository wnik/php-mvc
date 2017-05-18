<?php

namespace App\Core;

/**
 * Class View
 * @package App\Core
 */
class View
{
    public static function render(string $file, array $variables = array())
    {
        extract($variables);

        $filePath = dirname(__DIR__) . '/views/' . $file;

        if (file_exists($filePath))
            require_once $filePath;
        else
            throw new \Exception("View: $filePath not found");
    }
}