<?php

namespace App\Repositories;

use App\Interfaces\StorageInterface;

abstract class BaseRepository
{
    protected $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }
}