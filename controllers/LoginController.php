<?php

namespace Controllers;

use MVC\Router;
use Model\Email;
use Model\Usuario;

class LoginController{
    public static function login(Router $router){
        $alertas = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarlogin();
            if(empty($alertas)){
                $usuario = Usuario::ConsultaParametro("email", $auth->email);
                if($usuario){
                    if ($usuario->ComprobarPassword_Verificado($auth->password)){
                        session_start();
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['usuario'] = $usuario->usuario;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['telefono'] = $usuario->telefono;
                        $_SESSION['login'] = true;
                        $_SESSION["timeout"] = time();

                        if($usuario->admin === "1"){
                            $_SESSION['admin'] = $usuario->admin;
                            header('Location: /admin');
                        } else {
                            header('Location: /perfil');
                        }
                        
                    }
                } else {
                    Usuario::setAlerta('','Usuario no encontrado');
                }
            }
        }
        $alertas = Usuario::getAlertas();
        
        $router->view('auth/login', [
            'alertas' => $alertas,
            'email' => $auth->email ?? ''
        ]);
    }

    public static function forgot(Router $router){
        $alertas = [];
        // $auth = new Usuario;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarEmail();

            if(empty($alertas)){
                $resultado = $auth->ConsultaParametro('email', $auth->email);

                if($resultado && $resultado->confirmado === "1"){
                    $resultado->Crear_Token();
                    $resultado->Actualizar();
                    $email = new Email($resultado->email, $resultado->nombre, $resultado->token);
                    $email->Enviar_Instrucciones();
                    Usuario::setAlerta('exito', 'Esta acción requiere una verificación de correo. Por favor revisa tu buzón de correo y sigue las instrucciones enviadas para reestablecer tu contraseña.'); 
                } else {
                    Usuario::setAlerta('', 'El usuario no existe o no está confirmado.'); 
                    
                }
            }
            
        }

        $alertas = Usuario::getAlertas();
        $router->view('auth/forgot', [
            'alertas' => $alertas
            // 'auth' => $auth
        ]);
    }    
    
    public static function recover(Router $router){
        $alertas = [];
        $error = false;
        $t = $_GET['token'] ?? 0;
        $token = Sanitizar($t);
        $usuarios = Usuario::ConsultaParametro('token', $token);
        if(empty($usuarios)) {
            Usuario::setAlerta('token-rojo', 'Token no válido');
            $error = true;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $password = new Usuario($_POST);
            $usuarios->password = $password->password;
            $usuarios->Hash_Password();//Hashear password
            $usuarios->token = null;
            if($usuarios->Actualizar()){
                header('Location: /login');
            }
            // Usuario::setAlerta('token-verde', 'Tu contraseña se reestablecio con éxito.');
        }

        $alertas = Usuario::getAlertas();
        $router->view('auth/recover', [
            'errores' => $alertas,
            'error' => $error
        ]);
    }

    public static function create_account(Router $router){
        $usuarios = new Usuario;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuarios->Sincronizar($_POST);
            $alertas = $usuarios->validarCrear();

            if(empty($alertas)){
                //Verificar que el usuario no este registrado
                $resultado = $usuarios->existeUsuario();

                if($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    $usuarios->Hash_Password();//Hashear password
                    $usuarios->Crear_Token();
                    
                    if($usuarios->Insertar()){
                        $email = new Email($usuarios->email, $usuarios->nombre, $usuarios->token);//Enviar email
                        $email->Enviar_Confirmacion();
                        header('Location: /message');
                    }
                }
            }
        }

        $router->view('auth/create_account', [
            'alertas' => $alertas,
            'usuarios' => $usuarios
        ]);
    }

    public static function message(Router $router){
        $router->view('auth/message');
    }

    public static function Confirm(Router $router){
        $errores = [];
        $t = $_GET['token'] ?? 0;
        $token = Sanitizar($t);
        // Debuguear($_GET);
        $usuarios = Usuario::ConsultaParametro('token', $token);

        if(empty($usuarios)) {
            Usuario::setAlerta('token-rojo', 'Token no válido');
        } else {
            $usuarios->confirmado = "1";
            $usuarios->token = null;
            $usuarios->Actualizar();
            Usuario::setAlerta('token-verde', 'Tu cuenta se validó con éxito.');
        }

        $errores = Usuario::getAlertas();
        $router->view('auth/confirm', [
            'errores' => $errores
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /login');
    }
}