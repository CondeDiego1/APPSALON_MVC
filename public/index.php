<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIController;
use Controllers\CitaController;
use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\UsuarioController;
use Controllers\ServicioController;

$router = new Router();

//-------------------------------- CUENTA --------------------------------
//Iniciar Sesion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
//Recuperar password
$router->get('/forgot', [LoginController::class, 'forgot']);//olvidar
$router->post('/forgot', [LoginController::class, 'forgot']);
$router->get('/recover', [LoginController::class, 'recover']);//reestablecer
$router->post('/recover', [LoginController::class, 'recover']);
//Crear cuenta
$router->get('/create_account', [LoginController::class, 'create_account']);
$router->post('/create_account', [LoginController::class, 'create_account']);
//Confirmar cuenta
$router->get('/confirm', [LoginController::class, 'Confirm']);
$router->get('/message', [LoginController::class, 'message']);

//-------------------------------- PUBLICA --------------------------------
//Publica
$router->get('/', [PaginasController::class, 'index']);

//-------------------------------- USUARIOS --------------------------------
//Área privada usuarios
$router->get('/perfil', [UsuarioController::class, 'perfil']);
$router->post('/perfil', [UsuarioController::class, 'perfil']);
$router->get('/reservas', [UsuarioController::class,'misReservas']);
$router->get('/informacion', [UsuarioController::class,'index']);
$router->get('/editarperfil', [UsuarioController::class,'editar']);
$router->post('/editarperfil', [UsuarioController::class,'editar']);
$router->get('/eliminar', [UsuarioController::class,'eliminar']);
$router->post('/eliminar', [UsuarioController::class,'eliminar']);
//Cita
$router->get('/cita', [CitaController::class, 'reservas']);

//-------------------------------- API --------------------------------
//API citas
$router->get('/api/servicios', [APIController::class,'index']);
$router->post('/api/citas', [APIController::class,'guardar']);
$router->post('/api/eliminar', [APIController::class,'eliminar']);

//-------------------------------- ADMINISTRACIÓN --------------------------------
//Área privada administradores
$router->get('/admin', [AdminController::class,'index']);
$router->get('/admin/citas', [AdminController::class,'citas']);
$router->post('/admin/citas', [AdminController::class,'citas']);

//-------------------------------- DASHBOARD --------------------------------
//Parámetros dashboard
$router->get('/dashboar/servicio',[AdminController::class, 'promedioServiciomes']);

$router->get('/servicios',[ServicioController::class, 'index']);
$router->get('/servicios/crear',[ServicioController::class, 'crear']);
$router->post('/servicios/crear',[ServicioController::class, 'crear']);
$router->get('/servicios/actualizar',[ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar',[ServicioController::class, 'actualizar']);
$router->post('/servicios',[ServicioController::class, 'eliminar']);

$router->comprobarRutas();