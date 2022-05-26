<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class AdminController{
    public static function citas(Router $router){
        isAuth();
        isAdmin();
        date_default_timezone_set("America/Bogota");
        $fechaActual = date('Y-m-d');
        $fecha = $_GET['fecha'] ?? $fechaActual;
        $fechas = explode('-', $fecha);
        $usuario = $_GET['usuario'] ?? '';
        $hora = date('G:m:s', time());

        if(!checkdate($fechas [1], $fechas [2], $fechas[0])){
            header('Location: /404');
        }

        //--------------------------------- Reservas por filtro ---------------------------------
        $reservas_filtradas = Admin::reservas_Filtro($fecha, $usuario);
        $usuario_conreserva = Admin::consulta_usuario_conreserva(crear_Array($reservas_filtradas['array']));
        $servicios_usuario = Admin::consultaservicios_usuario(crear_Array($reservas_filtradas['array']));

        //--------------------------------- Reservas actuales ---------------------------------
        $reservas_actuales = Admin::reservas_Actuales($fechaActual, $hora);
        $usuarioreserva_actual = Admin::consulta_usuario_conreserva(crear_Array($reservas_actuales['array']));
        $servicio_actual = Admin::consultaservicios_usuario(crear_Array($reservas_actuales['array']));

        //--------------------------------- Todas las resevas ---------------------------------
        $todas_reservas = Admin::reservas();
        $usuarios = Admin::consulta_usuario_conreserva(crear_Array($todas_reservas['array']));
        $servicios = Admin::consultaservicios_usuario(crear_Array($todas_reservas['array']));

        $router->view('admin/citas', [
            'nombre' => $_SESSION['nombre'],
            'todas_reservas' => $todas_reservas['array'],
            'reservas_actuales' => $reservas_actuales,
            'reservas_filtradas' => $reservas_filtradas ?? null,
            'usuario_conreserva' => $usuario_conreserva,
            'servicios_usuario' => $servicios_usuario,
            'usuarioreserva_actual' => $usuarioreserva_actual,
            'servicio_actual' => $servicio_actual,
            'usuarios' => $usuarios,
            'servicios' => $servicios
        ]);
    }

    public static function index(Router $router){
        isAuth();
        isAdmin();
        $router->view('admin/index',[
            'nombre' => $_SESSION['nombre'],
        ]);
    }

    public static function promedioServiciomes(){
        isAuth();
        isAdmin();
        $servicio = Admin::reporte_mes();
        echo json_encode($servicio, JSON_PRETTY_PRINT);
    }

}