<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController{
    public static function index(Router $router){
        isAuth();
        isAdmin();
        $servicios = Servicio::Listar();
        $router->view('servicios/index', [
            'servicios' => $servicios
        ]);
    }

    public static function crear(Router $router){
        isAuth();
        isAdmin();
        $servicio = new Servicio;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $servicio->Sincronizar($_POST);
            $servicio->formatoPrecio();
            $alertas = $servicio->validar();
            if(empty($alertas)){
                $resultado = $servicio->Crear_ ();
                if($resultado['resultado']){
                    $script = true;
                } else {
                    $script = false;
                }
            }
        }
        
        if(isset($script) && $script == true || isset($script) && $script == false){
            $router->view('servicios/crear',[
                'servicio' => $servicio,
                'alertas' => $alertas,
                'script' => $script,
            ]);
        } else {
            $router->view('servicios/crear',[
                'servicio' => $servicio,
                'alertas' => $alertas
            ]);
        }
    }

    public static function actualizar(Router $router){
        session_start();
        isAdmin();
        if(!is_numeric($_GET['id']))return;
        $servicio = Servicio::ConsultaParametro('id', $_GET['id']);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $servicio->Sincronizar($_POST);
            $servicio->formatoPrecio();
            $alertas = $servicio->validar();
            if(empty($alertas)){
                $resultado = $servicio->Actualizar();
                if($resultado){
                    $script = true;
                } else {
                    $script = false;
                }
            }
        }

        if(isset($script) && $script == true || isset($script) && $script == false){
            $router->view('servicios/actualizar',[
                'servicio' => $servicio,
                'alertas' => $alertas,
                'script' => $script,
            ]);
        } else {
            $router->view('servicios/actualizar',[
                'servicio' => $servicio,
                'alertas' => $alertas
            ]);
        }
    }

    public static function eliminar(Router $router){
        session_start();
        isAdmin();
        $servicios = Servicio::Listar();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $servicio = Servicio::ConsultaParametro('id', $id);
            $resultado = $servicio->eliminarServicio($id);
            if($resultado){
                $script = true;
            } else {
                $script = false;
            }
        }

        if(isset($script) && $script == true || isset($script) && $script == false){
            $router->view('servicios/index',[
                'servicios' => $servicios,
                'script' => $script
            ]);
        } else {
            $router->view('servicios/index', [
                'servicios' => $servicios
            ]);
        }
    }
}