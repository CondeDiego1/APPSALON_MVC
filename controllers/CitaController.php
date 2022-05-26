<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\ActiveRecord;

class CitaController{
    public static function reservas(Router $router){
        isAuth();
        $router->view('cita/cita');
    }
}