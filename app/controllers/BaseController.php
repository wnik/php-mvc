<?php

namespace App\Controllers;
use App\Core\View;

/**
 * Class BaseController
 * @package App\Controllers
 */
abstract class BaseController
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    abstract protected function indexAction();
}