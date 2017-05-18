<?php

namespace App\Core;


class Router
{
    public function __construct(Request $request, Routes & $routes)
    {
        if ($request->match())
            $request->redirect($request->getRequestedRouteName(), true);
        else
            $request->redirect('error_page');
    }
}