<?php

namespace App\Controllers;

use App\Core\View;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    public function indexAction()
    {
        View::render('Home/index.php', array(
            'title' => 'Blablabal',
            'message' => 'Welcome! It is home page.'
        ));
    }
}