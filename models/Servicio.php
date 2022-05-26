<?php

namespace Model;

class Servicio extends ActiveRecord {

    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id','nombre','precio'];
    protected static $columna = 'id';
    public $id;
    public $nombre;
    public $precio;

    function __construct(array $args = []){
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] = '';
        $this->precio = $args['precio'] = 0;
    }

    public function formatoPrecio(){
        $this->precio = str_replace(".","",$this->precio);
    }

    public function validar(){
        if(!$this->nombre){
            self::$alertas['error'][]='El nombre del servicio es obligatorio';
        }
        if(!$this->precio){
            self::$alertas['error'][]='El precio del servicio es obligatorio';
        }
        if(!is_numeric($this->precio)){
            self::$alertas['error'][]='El formato del precio no es válido';
        }
        return self::$alertas;
    }

    public function eliminarServicio($id){
        $query = "DELETE FROM servicios WHERE id = '" . $id . "'";
        $resultado = $this->Eliminar($query);

        return $resultado;
    } 
}