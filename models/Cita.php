<?php

namespace Model;

class Cita extends ActiveRecord{
    protected static $tabla = 'citas';
    protected static $columnasDB = ['idCita','fecha','hora','usuario','total'];
    public $idCita;
    public $fecha;
    public $hora;
    public $usuario;
    public $total;

    public function __construct (array $args = []){
        $this->idCita = $args['idCita'] ?? NULL;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->total = $args['total'] ?? NULL;
    }

    public function eliminarCita(){
        $query = "DELETE FROM usuarios WHERE usuario = '" . $user . "'";
        $resultado = $this->Eliminar($query);

        return $resultado;
    } 
}