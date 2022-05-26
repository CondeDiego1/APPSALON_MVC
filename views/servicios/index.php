<h1>Servicios</h1>
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
