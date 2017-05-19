<?php

namespace App\Controllers;

use App\Core\PDOConnection;
use App\Core\View;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    public function indexAction()
    {
        $pdo = PDOConnection::getInstance();
        $conn = $pdo->getConnection();

        var_dump($conn);

        View::render('Home/index.php', array(
            'title' => 'Home - News',
            'message' => 'Welcome! It is home page.'
        ));
    }
}