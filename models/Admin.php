<?php

namespace Model;

class Admin extends ActiveRecord {

    public static function reservas_Actuales ($fecha, $hora){
        //$query = "SELECT c.idCita AS ID, u.usuario AS USUARIO, c.fecha AS FECHA, c.hora AS HORA, u.nombre AS CLIENTE,"; 
        //$query .= " u.email AS EMAIL, u.telefono AS TELEFONO, s.nombre AS SERVICIO,";  
        //$query .= " s.precio AS PRECIO FROM citasServicios cs";
        $query = "SELECT c.idCita AS ID ";
        $query .= self::cadena();
        $query .= " WHERE fecha = '" . $fecha . "' AND hora >= '" . $hora . "'";
        $resultado = static::SQL($query);
        return $resultado;
    }

    public static function reservas (){
        //$query = "SELECT c.idCita AS ID, u.usuario AS USUARIO, c.fecha AS FECHA, c.hora AS HORA, u.nombre AS CLIENTE,"; 
        //$query .= " u.email AS EMAIL, u.telefono AS TELEFONO, s.nombre AS SERVICIO,";  
        //$query .= " s.precio AS PRECIO FROM citasServicios cs";
        $query = "SELECT c.idCita AS ID ";
        $query .= self::cadena();
        $resultado = static::SQL($query);
        return $resultado;
    }

    public static function reservas_Filtro (string $fecha, $usuario){
        //$query = "SELECT c.idCita AS ID, u.usuario AS USUARIO, c.fecha AS FECHA, c.hora AS HORA, u.nombre AS CLIENTE,"; 
        //$query .= " u.email AS EMAIL, u.telefono AS TELEFONO, s.nombre AS SERVICIO,";  
        //$query .= " s.precio AS PRECIO FROM citasServicios cs";
        $query = "SELECT c.idCita AS ID, u.usuario AS USUARIO "; 
        $query .= self::cadena();

        if(empty($usuario)){
            $query .= " WHERE fecha = '" . $fecha . "'";
        }else if($usuario != 'Todos'){
            $query .= " WHERE fecha = '" . $fecha . "' AND u.usuario = '" . $usuario . "'";
        }else {
            $query .= " WHERE fecha = '" . $fecha . "'";
        }

        $resultado = static::SQL($query);
        return $resultado;
    }

    public static function consulta_usuario_conreserva($id){
        $array = array_values(array_unique($id));
        $objeto = new static;
        $pila = [];

        for($i = 0; $i < count($array); $i++){
            $query = "SELECT c.idCita AS ID, u.usuario AS USUARIO, c.fecha AS FECHA, c.hora AS HORA, u.nombre AS CLIENTE,"; 
            $query .= " u.email AS EMAIL, u.telefono AS TELEFONO";  
            $query .= self::cadena();
            $query .= " WHERE c.idCita = '" . $array[$i] . "' LIMIT 1";
            $resultado = static::SQL2($query);
            array_push($pila, $resultado[0]);
        }

        return $pila;
    }

    public static function consultaservicios_usuario($id){
        $array = array_values(array_unique($id));
        $objeto = new static;
        $pila = [];
        for($i = 0; $i < count($array); $i++){
            $query = "SELECT s.nombre AS SERVICIO,  s.precio AS PRECIO"; 
            $query .= self::cadena();
            $query .= " WHERE c.idCita = '" . $array[$i] . "'";
            $resultado = static::SQL2($query);
            array_push($pila, $resultado);
        }   
        return $pila;
    }

    public static function cadena (){
        return " FROM citasServicios cs INNER JOIN citas c ON cs.idCita = c.idCita INNER JOIN servicios s ON cs.idServicio = s.id INNER JOIN usuarios u ON c.usuario = u.usuario ";
    }

    public static function reporte_mes (){
        //Mes
        $ganancias_mes = "SELECT TRUNCATE((SUM(total) / (SELECT SUM(total) AS TOTAL FROM citas) * 100),1) AS TOTAL FROM citas WHERE MONTH(fecha) = (SELECT MONTH(CURDATE()))";
        $citas_mes = "SELECT COUNT(idCita) AS CITA FROM citas WHERE MONTH(fecha) = (SELECT MONTH(CURDATE()))";
        $servicio_preferido = "SELECT s.nombre AS SERVICIO FROM servicios s WHERE s.id = (SELECT COUNT(cs.idServicio) TOTAL FROM citasservicios cs GROUP BY cs.idServicio ORDER BY TOTAL DESC LIMIT 1)";
        $ganancias_totales = "SELECT SUM(total) AS GANANCIA FROM citas WHERE MONTH(fecha) = (SELECT MONTH(CURDATE()))";
        $cantidad_servicios = "SELECT COUNT(id) AS SERVICIOS FROM servicios";
        $cantidad_usuarios = "SELECT COUNT(usuario) AS USUARIOS FROM usuarios";
        $cantidad_citas = "SELECT COUNT(idCita) AS CITAS FROM citas";

        //Año
        $citas_año = "SELECT COUNT(idCita) AS CITAS_ANO FROM citas";
        $ganancias_año = "SELECT SUM(total) AS GANANCIA_ANO FROM citas";
        $ganancias = "SELECT TRUNCATE((SUM(total) / (SELECT SUM(total) AS TOTAL FROM citas) * 100),1) AS TOTALES FROM citas WHERE MONTH(fecha) = (SELECT MONTH(DATE_ADD(CURDATE(),INTERVAL -1 MONTH)))";


        $resultado1 = static::preparadas($ganancias_mes);
        $resultado2 = static::preparadas($citas_mes);
        $resultado3 = static::preparadas($servicio_preferido);
        $resultado4 = static::preparadas($ganancias_totales);
        $resultado5 = static::preparadas($cantidad_servicios);
        $resultado6 = static::preparadas($cantidad_usuarios);
        $resultado7 = static::preparadas($cantidad_citas);
        $resultado8 = static::preparadas($citas_año);
        $resultado9 = static::preparadas($ganancias_año);
        $resultado10 = static::preparadas($ganancias);
        
        $objeto = (object)[$resultado1,$resultado2,$resultado3,$resultado4,$resultado5,$resultado6,$resultado7,$resultado8,$resultado9,$resultado10];
        return $objeto;
    }

}