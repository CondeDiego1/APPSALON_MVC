<h1>Servicios</h1>
<div class="contenedor-boton">
    <a href="/admin">
        <button class="btn-fecla btn-fecha-izquierda">
            <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
            </svg>
            <span>Volver</span>
        </button>
    </a>
</div>
<a href="/servicios/crear">
    <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Agregar servicio</div>
    </button>
</a>
<ul class="servicios_contenedor margin">
    <?php foreach($servicios as $servicio) { ?>
        <li>
            <div>
                <p><span class=><?php echo $servicio->nombre; ?></span> </p>
                <p><span class=><?php echo precio($servicio->precio); ?></span> </p>
            </div>
            

            <div class="acciones">
                <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">
                    <button class="noselect no-margin icono_grande">
                        <span class="text">Editar</span>
                        <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="0.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                        </svg>
                        </span>
                    </button>
                </a>
                <form action="/servicios" method="POST">
                    <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                    <button class="noselect no-margin">
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
        </li>
    <?php } ?>
</ul>

<?php 
    if(isset($script) && $script == true){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Eliminar servicio',
                text: 'El servicio se eliminó correctamente.',
                button: 'OK',
            }).then(() => {
                window.location.href = '/servicios';
            });
        </script>
        ";
    } else if(isset($script) && $script == false) {
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo eliminar el servicio.',
            }).then(() => {
                window.location.href = '/servicios';
            });
        </script>";
    }
?>
