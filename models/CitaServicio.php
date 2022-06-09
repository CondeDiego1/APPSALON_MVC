<?php

namespace Model;

class CitaServicio extends ActiveRecord{
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id','idCita','idServicio'];
    public $id;
    public $idCita;
    public $idServicio;

    public function __construct (array $args = []) {
        $this->id = $args['id'] ?? NULL;
        $this->idCita = $args['idCita'] ?? NULL;
        $this->idServicio = $args['idServicio'] ?? NULL;
    }
}