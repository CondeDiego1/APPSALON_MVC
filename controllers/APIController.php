<?php

namespace Controllers;

use Model\SMS;
use Model\Cita;
use Model\Servicio;
use Model\CitaServicio;

class APIController{
    public static function index(){
        isAuth();
        $servicios = Servicio::Listar();
        echo json_encode($servicios, JSON_PRETTY_PRINT);
    }

    public static function guardar(){
        $cita = new Cita($_POST);
        $resultado = $cita->Crear_();

        if($resultado){
            $sms = new SMS($cita->usuario,$cita->fecha, $cita->hora, $cita->total);
            $sms->Enviar_reserva();
        }

        $id = $resultado['idCita'];

        $idServicios = explode(",", $_POST['servicios']);

        foreach($idServicios as $idServicio){
            $args = [
                'idCita' => $id,
                'idServicio' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio = $citaServicio->Crear_();
        }

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cita = Cita::Find('idCita', $_POST['id']);
            $cita->Eliminar("DELETE FROM citas WHERE idCita = '" . $cita->idCita . "'");
            header('Location:'. $_SERVER['HTTP_REFERER']);
        }
    }
}