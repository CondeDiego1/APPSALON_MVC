<?php

namespace Model;

use Model\ActiveRecord;

class Usuario extends ActiveRecord{
    protected static $columnasDB = ['usuario', 'nombre', 'email', 'telefono', 'password', 'admin', 'confirmado', 'token'];
    protected static $tabla = 'usuarios';
    protected static $columna = 'usuario';
    public $usuario;
    public $nombre;
    public $email;
    public $telefono;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    function __construct(array $args = []){
        $this->usuario = $args['usuario'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }

    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE (usuario = '" . $this->usuario . "' OR telefono = '" . $this->telefono . "' OR email = '" . $this->email . "')";
        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$alertas['error'][] = 'El usuario ya se encuentra registrado';
        }

        return $resultado;
    }

    public function validarlogin() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        return self::$alertas;
    }

    public function validarCrear() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if(!$this->usuario) {
            self::$alertas['error'][] = 'El usuario es obligatorio';
        }

        if(!$this->telefono) {
            self::$alertas['error'][] = 'El telefono es obligatorio';
        }

        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if(!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        if (strlen($this->nombre) < 15 || strlen($this->nombre) > 60) {
            self::$alertas['error'][] = "El nombre es muy corto o muy largo";
        }

        if (!preg_match('/[a-z]/', $this->nombre) || !preg_match('/[A-Z]/', $this->nombre)) {
            self::$alertas['error'][] = "Debe ingresar un nombre válido";
        }

        if (strlen($this->usuario) != 10) {
            self::$alertas['error'][] = "El usuario es muy corto";
        }

        if (preg_match('\s',$this->usuario)) {
            self::$alertas['error'][] = "El usuario no puede contener espacios en blanco";
        }

        if(!is_numeric($this->telefono)){
            self ::$alertas['error'][] = 'El teléfono no es válido';
        }

        if (strlen($this->telefono) != 10) {
            self::$alertas['error'][] = "El teléfono es muy corto";
        }

        if (!preg_match('/[a-z]/',$this->password)) {
            self::$alertas['error'][] = "La contraseña debe contener una minuscula.";
        }

        if (!preg_match('/[A-Z]/',$this->password)) {
            self::$alertas['error'][] = "La contraseña debe contener una mayúscula.";
        }

        if (!preg_match('/[0-9]/',$this->password)) {
            self::$alertas['error'][] = "La contraseña debe contener un número.";
        }

        if (strlen($this->password) < 8) {
            self::$alertas['error'][] = "La contraseña debe ser mayor a 8 dígitos";
        }

        if (!preg_match('/[._-]/',$this->password)) {
            self::$alertas['error'][] = "La contraseña debe contener un caracter '.-_'";
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        return self::$alertas;
    }

    public function Hash_Password(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function Crear_Token(){
        $this->token = uniqid();
    }

    public function Sanitizar(){//Limpiar la entrada de datos
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] =  self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function Insertar(){
        $atributos = $this->Sanitizar();
        $query = "INSERT INTO usuarios (" . join(',', array_keys($atributos)) . ")" . " VALUES ('" . join("','", array_values($atributos)) . "')";
        $resultado = $this->Crear($query);
        return $resultado;
    }

    public function Act(){
        $atributos = [];
        foreach(static::$columnasDB as $columnas){
            if($columnas === 'usuario') continue; //Para ignorarlo
            $atributos[$columnas] = $this->$columnas;
        }
        return $atributos;
    }

    public function ComprobarPassword_Verificado($password){
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado) {
            self::$alertas[][] = 'Password incorrecto o tu cuenta no ha sido confirmada.';
            return false;
        } else {
            return true;
        }
    }

    public static function Hash($password){
        $password = password_hash($password, PASSWORD_BCRYPT);
        return $password;
    }

    public function editarusuario($usuario, $telefono, $contraseña){
        if($contraseña == ""){
            $query = "UPDATE usuarios SET telefono = '" . $telefono . "' WHERE usuario = '" . $usuario . "'";
        } else {
            $contraseña = static::Hash($contraseña);
            $query = "UPDATE usuarios SET telefono = '" . $telefono . "', password = '" . $contraseña . "' WHERE usuario = '" . $usuario . "'";
        }

        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function eliminarUsuario($user){
        $query = "DELETE FROM usuarios WHERE usuario = '" . $user . "'";
        $resultado = $this->Eliminar($query);

        return $resultado;
    } 
}
