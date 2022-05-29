<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    CerrarSesion();
}
?>
<div class="perfil">
    <section class="logo">
        <img src="../build/img/bigote2.png" alt="imagen bigote">
        <h1>BarberShop</h1>
    </section>

    <div class="flex flex-perfil">
        <div>
            <h3 class="izquierda" id="h">Bienvenido,</h3>
            <h3 class="izquierda"><?php echo($_SESSION['nombre']); ?></h3>
            <h3 class="usuario_oculto" id="usuario_oculto"><?php echo($_SESSION['usuario']); ?></h3>
        </div>
        <a href="/eliminar">
            <button class="eliminar-cuenta">Eliminar cuenta</button>
        </a>
    </div>
    

    <br>
    <br>

    <h3>¿Qué quieres hacer hoy?</h3>
    <div class="contenedor-hacer">
        <a href="/editarperfil">
            <section>
                <h3>Editar perfil</h3>
                <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                <lord-icon src="https://cdn.lordicon.com/eszyyflr.json" trigger="loop"
                    colors="primary:#000000,secondary:#000000" style="width:130px;height:130px">
                </lord-icon>
            </section>
        </a>

        <a href="/cita">
            <section>
                <h3>Reservar cita</h3>
                <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                <lord-icon src="https://cdn.lordicon.com/mekvzgwx.json" trigger="loop"
                    colors="primary:#000000,secondary:#000000" style="width:130px;height:130px">
                </lord-icon>
            </section>
        </a>

        <a href="/reservas">
            <section>
                <h3>Ver todas mis reservas</h3>
                <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
                <lord-icon src="https://cdn.lordicon.com/jqeuwnmb.json" trigger="loop"
                    colors="primary:#000000,secondary:#000000" style="width:130px;height:130px">
                </lord-icon>
            </section>
        </a>

        <a class="sin-padding">
            <form method="POST" action="/perfil">
                <button>
                    <h3>Salir</h3>
                    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/moscwhoj.json" trigger="loop"
                        colors="primary:#000000,secondary:#000000" style="width:130px;height:130px">
                    </lord-icon>
                </button>
            </form>
        </a>
    </div>
</div>

<?php
    $script = "<script src='build/js/app.js'></script>"
?>

<?php 
    if(isset($resultado_eliminar) && $resultado_eliminar == true){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
        Swal.fire({
            title: 'Advertencia',
            text: 'Esta acción no se puede deshacer. Se eliminará de forma permanentemente la cuenta y todos los datos relacionados. Si elimina su cuenta deberá crear una nuevamente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
               eliminacion();
            }
          })

        async function eliminacion () {
            try {
                const url = 'https://barbershopco.herokuapp.com/eliminar';
                const respuesta = await fetch(url, {
                    method: 'POST',
                    body: '',
                });
                window.location.href = '/perfil';
            } catch (error) {
                console.log(error);
            }
        }
        </script>
        ";
    } else if(isset($resultado_eliminar) && $resultado_eliminar == false) {
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No pudimos eliminar tu cuenta, intentalo más tarde.',
            })
        </script>";
    }
?>