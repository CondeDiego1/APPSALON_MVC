<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App BarberShop</title>
    <link rel="stylesheet" href="build/css/app.css">
    <meta name="description" content="Página web de Salon de Belleza">
    <link rel="icon" type="image/png" href="../build/img/icono.png" />
</head>
<body>
    <div class="contenedor-estetica">
        <div class="imagen">
            <div class="overlay"></div>
        </div>

        <div class="contenedor-reservas contenedor section">
            <h1>todas mis reservas</h1>
            <table class="reservas">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($resultado as $resul){ ?>
                        <tr>
                            <td><?php echo($resul['nombre']); ?></td>
                            <td><?php $date = date_create($resul['fecha']); echo(date_format($date, "d.m.Y")); ?></td>
                            <td><?php $date = date_create($resul['hora']); if($resul['hora'] > 12){$horari = "p.m.";} else {$horari = "a.m.";} echo(date_format($date, "h:i") ." ".$horari); ?></td>
                            <td><?php echo ("$" . number_format(intval($resul['precio']), 0, ",", ".")); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div class="paginacion">
                <a href="/perfil">
                    <button class="btn-fecla btn-fecha-izquierda">
                        <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                            <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                        </svg>
                        <span>Inicio</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>  
<?php
    $script = "<script src='build/js/app.js'></script>"
?>



