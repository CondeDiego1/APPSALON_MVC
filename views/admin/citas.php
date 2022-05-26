<nav class="tabs contenedor margin-top">
    <button type="button" data-paso="1">Citas filtradas</button>
    <button type="button" data-paso="2">Citas actuales</button>
    <button type="button" data-paso="3">Todas las citas</button>
</nav>

<!-- Inicia Contenido App -->
<div id="paso-1" class="seccion">
    <!-- <p>Para buscar una cita filtre por el campo de fecha</p> -->
    <div class="busqueda">
        <form class="formulario-cliente formulario-login formulario" method="POST" action="/admin">
            <div class="inputContainer">
                <input type="date" class="input__modificado input" id="fecha" name="fecha" value="<?php echo($_GET['fecha']) ?? '' ?>" required>
                <label for="" class="label">Fecha</label>
            </div>

            <div class="contenedor-usuario">
                <label>Usuario</label>
                <select class="usuario" name="propiedad[cedula]" id="usuario" required <?php if(empty($reservas_filtradas['array'])) { echo ('disabled'); } ?> >
                    <option value="" selected>------ Seleccione ------</option>
                    <?php
                    $array = []; 
                    foreach ($reservas_filtradas['array'] as $reservas){ 
                        $array[] = $reservas['USUARIO']; 
                    }?>

                    <?php foreach ($array = array_unique($array) as $reservas){?>
                        <option value="<?php echo ($reservas) ?>"><?php echo ($reservas) ?></option>
                    <?php } 
                    if(!empty($array)){ ?>
                        <option value="Todos">Todos los usuarios</option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>
        <?php if($reservas_filtradas['resultado']->num_rows ?? null){ ?>
            <div class="contenedor-reservaciones">
                <?php for($i = 0; $i < count($usuario_conreserva); $i++){?>
                    <div class="reservacion">
                        <div class="linea"><h3 class="titulo-reserva">Reserva N° <?php echo($usuario_conreserva[$i]['ID']); ?></h3></div>
                        <h4>Datos</h4>
                        <p><?php echo($usuario_conreserva[$i]['CLIENTE']); ?></p>
                        <p class="negrita"><?php echo(fecha($usuario_conreserva[$i]['FECHA']) . " - " . hora($usuario_conreserva[$i]['HORA'])); ?></p>
                        <p><?php echo($usuario_conreserva[$i]['USUARIO']); ?></p>
                        <p><?php echo($usuario_conreserva[$i]['TELEFONO']); ?></p>
                        <div>
                            <h4>Servicios</h4>
                            <?php
                                $total = 0;
                                for($k = 0; $k < count($servicios_usuario[$i]); $k++) { ?>
                                    <div class="flex">
                                        <p class="negrita"><?php echo($servicios_usuario[$i][$k]['SERVICIO']) ?></p>
                                        <p class="no-margin"><?php echo(precio($servicios_usuario[$i][$k]['PRECIO'])); ?></p>
                                        <?php
                                            $total +=$servicios_usuario[$i][$k]['PRECIO'];
                                        ?>
                                    </div>
                                <?php }
                            ?>
                        </div>
                        <h3 class="total">Total: <span><?php echo(precio($total)); ?></span></h3>
                    </div>
                <?php } ?>
            </div>         
        <?php } else { ?>
            <p>No hay citas para el día seleccionado.</p>
        <?php } ?>
</div>

<div id="paso-2" class="seccion">
    <?php if($reservas_actuales['resultado']->num_rows ?? null){ ?>
        <div class="contenedor-reservaciones">
            <?php for($i = 0; $i < count($usuarioreserva_actual); $i++){?>
                <div class="reservacion">
                <div class="linea"><h3 class="titulo-reserva">Reserva N° <?php echo($usuarioreserva_actual[$i]['ID']); ?></h3></div>
                    <h4>Datos</h4>
                    <p><?php echo($usuarioreserva_actual[$i]['CLIENTE']); ?></p>
                    <p class="negrita"><?php echo(fecha($usuarioreserva_actual[$i]['FECHA']) . " - " . hora($usuarioreserva_actual[$i]['HORA'])); ?></p>
                    <p><?php echo($usuarioreserva_actual[$i]['USUARIO']); ?></p>
                    <p><?php echo($usuarioreserva_actual[$i]['TELEFONO']); ?></p>
                    <div>
                        <h4>Servicios</h4>
                        <?php
                            $total = 0;
                            for($k = 0; $k < count($servicio_actual[$i]); $k++) { ?>
                                <div class="flex">
                                    <p class="negrita"><?php echo($servicio_actual[$i][$k]['SERVICIO']) ?></p>
                                    <p class="no-margin"><?php echo(precio($servicio_actual[$i][$k]['PRECIO'])); ?></p>
                                    <?php
                                        $total +=$servicio_actual[$i][$k]['PRECIO'];
                                    ?>
                                </div>
                            <?php }
                        ?>
                    </div>
                    <h3 class="total">Total: <span><?php echo(precio($total)); ?></span></h3>
                </div>
            <?php } ?>
        </div>         
    <?php } else { ?>
        <p>No citas activas en este momento.</p>
    <?php } ?>
</div>

<div id="paso-3" class="seccion">
    <div class="contenedor-reservaciones">
        <?php for($i = 0; $i < count($usuarios); $i++){?>
            <div class="reservacion">
                <div class="linea"><h3 class="titulo-reserva">Reserva N° <?php echo($usuarios[$i]['ID']); ?></h3></div>
                <h4>Datos</h4>
                <p><?php echo($usuarios[$i]['CLIENTE']); ?></p>
                <p class="negrita"><?php echo(fecha($usuarios[$i]['FECHA']) . " - " .hora($usuarios[$i]['HORA'])); ?></p>
                <p><?php echo($usuarios[$i]['USUARIO']); ?></p>
                <p><?php echo($usuarios[$i]['TELEFONO']); ?></p>
                <div>
                    <h4>Servicios</h4>
                    <?php
                        $total = 0;
                        for($k = 0; $k < count($servicios[$i]); $k++) { ?>
                            <div class="flex">
                                <p class="negrita"><?php echo($servicios[$i][$k]['SERVICIO']) ?></p>
                                <p class="no-margin"><?php echo(precio($servicios[$i][$k]['PRECIO'])); ?></p>
                                <?php
                                    $total +=$servicios[$i][$k]['PRECIO'];
                                ?>
                            </div>
                        <?php }
                    ?>
                </div>
                <h3 class="total">Total: <span><?php echo(precio($total)); ?></span></h3>
                <form action="/api/eliminar" method="POST">
                    <input type="hidden" name="id" value="<?php echo($usuarios[$i]['ID']); ?>">
                    <button class="noselect">
                        <span class="text">Eliminar</span>
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        <?php } ?>
    </div>    
</div>

<div class="paginacion admin-menu">
    <a href="/admin">
        <button class="btn-fecla btn-fecha-izquierda">
            <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
            </svg>
            <span>Inicio</span>
        </button>
    </a>
</div>

<?php
   $script = "<script src='../build/js/buscador.js'></script>"
?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(eliminarURL(), 3000);
    });

    function eliminarURL() {
        const parametrosUrl = window.location;
        window.history.replaceState(null, document.title, window.location.origin + window.location.pathname);
    }

    if (window.history.replaceState) { //verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
</script>