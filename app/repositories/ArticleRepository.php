<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\ArticleModel;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    public function add(ArticleModel $article)
    {
        $conn = $this->storage->getConnection();

        var_dump($article);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }
}