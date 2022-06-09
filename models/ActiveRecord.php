<?php
namespace Model;
class ActiveRecord {

    //------------------------------- ATRIBUTOS -------------------------------
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    protected static $alertas = [];// Alertas y Mensajes
    
    //------------------------------- FUNCIONES -------------------------------
    public static function setDB($database){//Conexión
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje) {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas() {
        return static::$alertas;
    }

    public function validar() {
        static::$alertas = [];
        return static::$alertas;
    }

    public function Id(){
        if(static::$tabla == 'servicios'){
            $id = $this->id;
        } else if (static::$tabla == 'usuarios'){
            $id = $this->usuario;
        } else if (static::$tabla == 'citas') {
            $id = $this->idCita;
        }
        return $id;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach ($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function atributos(){ //Identifica y une los atributos de la DB
        // $id = $this->Id();
        $atributos = [];
        foreach(static::$columnasDB as $columnas){
            if($columnas === 'id') continue; //Para ignorarlo
            if($columnas === 'idCita' && static::$tabla == 'citas') continue; //Para ignorarlo
            $atributos[$columnas] = $this->$columnas;
        }
        return $atributos;
    }

    public function SanitizarDatos(){//Limpiar la entrada de datos
        if(static::$tabla == 'usuarios'){
            $atributos = $this->Act();
        } else if (static::$tabla != 'usuarios'){
            $atributos = $this->atributos();
        }

        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] =  self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    //Reescribre el args con el array del $_POST
    public function Sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
    
    public static function Listar() {
        $query = "SELECT * FROM " . static::$tabla;
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function Find($columna,$id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE " . $columna . " = ${id}";
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

    public static function consultarSQL($query) {
        $resultado = self::$db->query($query);
        $array = [];

        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();
        return $array;
    }

    //------------------------------- CRUD -------------------------------
    public function Crear($query) {
        $resultado = self::$db->query($query);  
        return $resultado;
    }

    public function Crear_ () {
        // Sanitizar los datos
        $atributos = $this->SanitizarDatos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('"; 
        $query .= join("', '", array_values($atributos));
        $query .= "') ";
        
        // if(static::$tabla == 'servicios'){
        //     $celda;
        // } else if (static::$tabla == 'usuarios'){
        //     $id = $this->usuario;
        if (static::$tabla == 'citas') {
            $celda = 'idCita';
        } else if (static::$tabla == 'citasservicios' || static::$tabla == 'servicios'){
            $celda = 'id';
        }
        // return json_encode(['query' => $query]); //Ver la respuesta Fecth que estamos ejecutando
        $resultado = self::$db->query($query);
        return [
           'resultado' =>  $resultado,
           $celda => self::$db->insert_id
        ];
    }

    //ojito
    public function Actualizar() {
        // Sanitizar los datos
        $atributos = $this->SanitizarDatos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $id = $this->Id();

        $query = "UPDATE ". static::$tabla ." SET " . join(', ',$valores) . " WHERE ". static::$columna . " = '" . self::$db->escape_string($id) . "'";

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function Eliminar($query) {
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function ConsultaParametro(string $campo, $valor){
        $query = "SELECT * FROM " . static::$tabla. " WHERE $campo = '{$valor}'";
        $resultado = self::$db->query($query);

        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        } 

        $resultado->free();

        return array_shift($array);
        //array_shift elimina el primer elemento del array, se convierte en un tipo de objeto
    }

    //Usuario
    public static function todasReservas (string $usuario) {
        $query = "SELECT s.nombre, c.fecha, c.hora, s.precio FROM citasservicios cs INNER JOIN citas c ON cs.idCita = c.idCita INNER JOIN servicios s ON cs.idServicio = s.id INNER JOIN usuarios u ON c.usuario = u.usuario WHERE u.usuario = '${usuario}'";

        $resultado = mysqli_query(self::$db, $query);
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = $registro;
        } 

        $resultado->free();//Liberar memoria
        return $array;
    }

    public static function SQL($query) {
        $resultado = self::$db->query($query);
        $array = [];

        while($registro = $resultado->fetch_assoc()) {
            $array[] = $registro;
        }
        
        return [
            'resultado' =>  $resultado,
            'array' => $array
         ];
    }

    public static function SQL2 ($query) {
        $resultado = self::$db->query($query);
        $array = [];
        
        while($registro = $resultado->fetch_assoc()) {
            $array[] = $registro;
        }

        return $array;
    }

    public static function preparadas ($query){
        $stmt = self::$db->prepare($query); //Lo preparamos
        $stmt->execute(); //Lo ejecutamos
        $stmt->bind_result($titulo); // Creamos la variable
        $stmt->fetch();
        // Debuguear($stmt);

        // while ($stmt->fetch()) { //
        //     echo ("<pre>");      //
        //     var_dump($titulo);   //Imprimir el resultado
        //     echo ("</pre>");     //
        // }    
        // Debuguear($titulo);
        return $titulo;
    }

    //-------------------------------NO USADO -----------------------------------------------------

    // public static function Consulta($query) {
    //     $resultado = self::$db->query($query);
    //     $array = [];

    //     while($registro = $resultado->fetch_assoc()){
    //         $array[] = self::crearObjeto($registro);
    //     } 

    //     $resultado->free();//Liberar memoria
    //     return $array;
    // }

    // public static function get($limite) {
    //     $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";
    //     $resultado = self::consultarSQL($query);
    //     return array_shift( $resultado ) ;
    // }
}