<?php

namespace App\Controllers;

use App\Core\View;

class ErrorController extends BaseController
{
    public function indexAction()
    {
        View::render('includes/header.php');
        View::render('Error404/index.php', array(
            'title' => 'Page not found - error 404'
        ));
        View::render('includes/footer.php');
    }
}