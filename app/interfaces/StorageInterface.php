<?php

namespace App\Interfaces;


interface StorageInterface
{
    public function getConnection();
    public function save();
    public function findAll();
    public function findById();
    public function update();
    public function delete();
}