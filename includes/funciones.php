<?php

function Debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Sanitizar, escapar
function Sanitizar(string $html) : string {
    $sanitizar = htmlspecialchars($html, ENT_QUOTES);
    return $sanitizar;
}

function autenticado() {
    session_start();
    // $auth = $_SESSION['login'] ?? false;
    if (!$_SESSION['login']) {
        header('Location: /');
    }
}


function isAuth() : void {
    // session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: /login');
    }
}

function isAdmin() : void {
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: /login');
    }
}

function CerrarSesion(){
    session_start(); 
    $_SESSION = []; 
    header('Location: /login');
}

function fecha($fecha){
    $date = date_create($fecha); 
    return date_format($date, "d.m.Y");
}

function hora($hora){
    $date = date_create($hora); 
    return date_format($date, "h:i a");
}

function precio($precio){
    return "$" . number_format(intval($precio), 0, ",", ".");
}

function crear_Array($lista){
    $array = []; 
    foreach ($lista as $reservas){ 
        $array[] = $reservas['ID']; 
    }

    $array = array_values(array_unique($array));
    return $array;
}