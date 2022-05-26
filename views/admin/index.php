<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App BarberShop</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <meta name="description" content="Página web de Salon de Belleza">
    <link rel="icon" type="image/png" href="../build/img/icono.png" />
</head>
<body class="contenedor-admin">
    <header class="header-admin">
        <a href="index.php">
            <h1 class="negro">BarberShop</h1>
        </a>
        <form method="GET" action="/logout">
            <button class="no-style">Cerrar Sesión</button>
        </form>
    </header>
    
    <div class="contenedores">
        <aside class="navegacion-aside">
            <h3 class="small">
                <?php echo($nombre); ?><small>Gold Member</small> 
            </h3>
            <details class="detalle">
                <summary>Navegación</summary>
                <ul class='nav'>
                    <li><a href="/admin/citas">Reservas</a></li>
                    <li><a href="/servicios">Servicios</a></li>
                    <li><a href="/admin/usuarios">Usuarios</a></li>
                </ul>
            </details>
        </aside>

        <section class="navegacion-section">
            <h2 class="card-titulo">Reporte mensual</h2>
            <div class="seccion-informacion">
                <div class="card-body">
                    <h2 id="cantidad_servicios"></h2>
                    <p>Servicios</p>
                </div>

                <div class="card-body">
                    <h2 id="cantidad_usuarios"></h2>
                    <p>Usuarios</p>
                </div>

                <div class="card-body">
                    <h2 id="cantidad_citas"></h2>
                    <p>Citas</p>
                </div>
            </div>

            <div class="card-reporte">
                <div class="grafica">
                    <h2>Promedio</h2>
                    <canvas id="myCanvas"></canvas>
                    <div class="mylegend" id="myLegend"></div>
                </div>
                <div class="reporte">
                    <h2>Estado actual</h2>
                    <div class="citas-mes">
                        <p class="gris">Citas total:</p>
                        <p class="verde" id="citas-actuales"></p>
                    </div>
                    <div class="servicio-solicitado">
                        <p class="gris">Servicio preferido:</p>
                        <p class="verde" id="servicio-preferido"></p>
                    </div>
                    <div class="ganancias-totales">
                        <p class="gris">Ganancias:</p>
                        <p class="verde" id="ganancias-mes"></p>
                    </div>
                </div>
            </div>

            <h2 class="card-titulo">Reporte año</h2>
            <div class="card-reporte">
                <div class="grafica">
                    <h2>Promedio</h2>
                    <canvas id="canvas_año"></canvas>
                    <div class="mylegend" id="legend_año"></div>
                </div>
                <div class="reporte_año">
                    <h2>Estado actual</h2>
                    <div class="citas-mes">
                        <p class="gris">Citas totales:</p>
                        <p class="verde" id="citas-año"></p>
                    </div>
                    <div class="ganancias-totales">
                        <p class="gris">Ganancia total:</p>
                        <p class="verde" id="ganancias-año"></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/build/js/admin.js" defer></script>
</body>
</html>

