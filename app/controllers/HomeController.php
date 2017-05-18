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
        View::render('includes/header.php');
        View::render('Home/index.php', array(
            'title' => 'Blablabal'
        ));
        View::render('includes/footer.php');
    }
}