<?php

namespace App\Core;


class UriFilter implements FilterInterface
{
    public function filter($data): string
    {
        $data = strtolower($data);
        $data = filter_var(rtrim($data, '/'), FILTER_SANITIZE_URL);

        return $data;
    }
}