<?php

namespace App\Controllers;

use App\Core\View;

class ErrorController extends BaseController
{
    public function indexAction()
    {
        $this->view->render('Error404/index.php',
                                array(
                                    'title' => 'Page not found - error 404',
                                    'message' => 'Sorry! It is error 404 page'
                                ),
                            404
        );
    }
}