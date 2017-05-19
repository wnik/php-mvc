<?php

namespace App\Interfaces;

use App\Models\ArticleModel;


interface ArticleRepositoryInterface
{
    public function add(ArticleModel $article);

    public function delete(int $id);
}