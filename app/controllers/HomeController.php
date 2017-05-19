<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\ArticleModel;
use App\Repositories\ArticleRepository;
use App\Storages\PDOStorage;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    public function indexAction()
    {
        $repository = new ArticleRepository(PDOStorage::getInstance());
        $article = new ArticleModel(1, 'Example Title', 'Example Content', '2017-05-19', 'admin');
        $repository->add($article);

        View::render('Home/index.php',
                        array(
                            'title' => 'Home - News',
                            'message' => 'Welcome! It is home page.'
                        )
        );
    }
}