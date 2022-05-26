<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {
        session_start();
        $auth = $_SESSION['login'] ?? null;
        //Cambio PATH_INFO por REQUEST_URI, por que el primero es de forma local
        $currentUrl = $_SERVER['REQUEST_URI'] === ''? '/' : $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $rutas_protegidas = ['/create_account', '/recover','/forgot', '/message', '/login'];
        $rutas_no_admin = ['/perfil', '/editarperfil','/cita', '/reservas'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if(in_array($currentUrl, $rutas_protegidas) && $auth){
            if($_SESSION['admin']){
                header('Location: /admin');
            } else {
                header('Location: /perfil');
            }
        }

        if(in_array($currentUrl, $rutas_no_admin) && isset($_SESSION['admin'])){
            header('Location: /admin');
        }

        if ( $fn ) {
            call_user_func($fn, $this); 
        } else {
            include __DIR__ . "/views/paginas/error.php";
        }
    }

    public function view($view, $datos = []) {
        $rutas_normales = ["servicios/index","paginas/index","cita/cita","usuario/perfil", "usuario/reservas","admin/index","admin/citas"];
        
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        if($view == 'admin/index') {
            include __DIR__ . "/views/admin/index.php";
        } else if(!in_array($view, $rutas_normales)){
            include __DIR__ . "/views/layout.php";
        } else if(in_array($view, $rutas_normales) && $view != "paginas/index"){
            include __DIR__ . "/views/layout2.php";
        } else{
            // include __DIR__ . "/views/layout.php";
            echo($contenido);
        }
    }
}
