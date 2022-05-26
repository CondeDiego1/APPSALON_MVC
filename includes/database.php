<?php

declare(strict_types=1);
function conexionBD(): mysqli
{
    $db = new mysqli('localhost', 'root', '', 'appsalon');

    // $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_DATABASE']);

    $db->set_charset('utf8');

    if (!$db) {
        echo ('Ocurrio un fallo inesperado en la conexión');
        exit;
    }

    return $db;
}

