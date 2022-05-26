<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\ActiveRecord;

class usuarioController {
    //Si falla la sesion video 499 y 534
    public static function perfil(Router $router){
        isAuth();
        $router->view('usuario/perfil');
    }

    public static function editar(Router $router){
        $usuarios = Usuario::ConsultaParametro('usuario', $_SESSION['usuario']);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($usuarios->{'telefono'} === $_POST['telefono'] && $_POST['password'] === ""){
                $script = false;
            } else if($usuarios->{'telefono'} != $_POST['telefono'] || $_POST['password'] != "") {
                $resultado = $usuarios->editarusuario($_SESSION['usuario'], $_POST['telefono'], $_POST['password']);
                if($resultado){
                    $script = true;
                } else {
                    $script = false;
                }
            }
        }

        if(isset($script) && $script == true || isset($script) && $script == false){
            $router->view('usuario/editarperfil',[
                'script' => $script,
                'usuarios' => $usuarios
            ]);
        } else {
            $router->view('usuario/editarperfil',[
                'usuarios' => $usuarios
            ]);
        }
    } 

    public static function misReservas (Router $router){
        isAuth();
        $usuario = $_SESSION['usuario'];
        $resultado = ActiveRecord::todasReservas($usuario);
        
        $router->view('usuario/reservas',[
            'resultado' => $resultado
        ]);
    }

    public static function eliminar(Router $router){
        // Debuguear($_SESSION);
        $resultado_eliminar = true;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuarios = new Usuario;
            $resultado = $usuarios->eliminarUsuario($_SESSION['usuario']);
            if($resultado){
                session_start(); 
                $_SESSION = []; 
                $eliminacion = true;
                echo json_encode(['resultado' => $eliminacion]);
                header('Location: /login');
            } else {

            }
        }

        $router->view('usuario/perfil',[
            'resultado_eliminar' => $resultado_eliminar,
            'eliminacion' => $eliminacion ?? false
        ]);
    }

    public static function eliminacion () {
        $usuarios = new Usuario;
        $resultado = $usuarios->eliminarUsuario($_SESSION['usuario']);
        if($resultado){
            echo json_encode(['resultado' => $resultado]);
            session_start(); 
            $_SESSION = []; 
        }
    }
}
    