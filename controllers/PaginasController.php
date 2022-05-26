<?php

namespace Controllers;

use MVC\Router;

class PaginasController{
    public static function index(Router $router){
        $router->view('paginas/index',[]);
    }
}