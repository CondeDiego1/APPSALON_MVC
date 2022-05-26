    <div class="flex-formulario">
        <form class="formulario-login" method="POST">
            <fieldset>
                <legend class="margin-bottom">Editar Perfil</legend>
                <div class="inputContainer">
                    <input type="text" class="input__modificado input" id="nombre" name="nombre" placeholder="Nombre Completo" value="<?php echo($_SESSION['nombre']) ?>" readonly>
                    <label for="" class="label">Nombre Completo</label>
                </div>

                <div class="inputContainer">
                    <input class="input__modificado input" type="text" id="usuario" name="usuario" placeholder="Nombre Usuario" value="<?php echo($_SESSION['usuario']) ?>" readonly>
                    <label for="" class="label">Nombre Usuario</label>
                </div>

                <div class="inputContainer">
                    <input class="input__modificado input" type="email" id="email" name="email" placeholder="Email" value="<?php echo($_SESSION['email']); ?>" readonly>
                    <label for="" class="label">Email</label>
                </div>

                <div class="inputContainer">
                    <input class="input__modificado input" type="tel" id="telefono" name="telefono" placeholder="Teléfono" value="<?php echo($usuarios->{'telefono'}) ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="10" minlength="10" required>
                    <label for="" class="label">Telefono</label>
                </div>
                
                <div class="contenedor-ver">
                    <div class="inputContainer">
                        <input class="input__modificado input" type="password" id="password" name="password" placeholder="Contraseña" pattern="^(?=\w*[._-])(?=\w*[A-Z])(?=\w*[a-z])\S{10,20}$"  onkeypress="return (event.charCode != 32)" maxlength="20" minlength="10" autocomplete="off">
                        <label for="" class="label">Contraseña</label>
                    </div>
                    <label data-cy="vercontraseña" onclick="myFunction()" for="vercontraseña"><img id="control" src="" alt="imagen login"></label>
                </div>
                <div class="validaciones-contraseña no-margin">
                    <p class="ps">La contraseña debe ser mayor a 10 dígitos y debe contener una mayúscula, una minuscula, un número.</p>
                </div>
            </fieldset>
            <div class="paginacion">
                <a href="/perfil">
                    <button class="btn-fecla">
                        <span>Guardar cambios</span>
                        <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                            <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                        </svg>
                    </button>
                </a>
            </div>
        </form>
        <div class="contenedor-boton">
            <a href="/perfil">
                <button class="btn-fecla btn-fecha-izquierda">
                    <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                    </svg>
                    <span>Volver</span>
                </button>
            </a>
        </div>
    </div>

<script>
    var x = document.getElementById("password");
    const control = document.getElementById("control");
    if (x.type === "password") {
        control.src = "/build/img/visible48.png";
    } else {
        control.src = "/build/img/ojo48.png";
    }
    function myFunction() {
        var x = document.getElementById("password");
        const control = document.getElementById("control");
        if (x.type === "password") {
            x.type = "text";
            control.src = "/build/img/ojo48.png";
        } else {
            x.type = "password";
            control.src = "/build/img/visible48.png";
        }
    }
</script>

<?php 
    if(isset($script) && $script == true){
        echo "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cambios Realizados',
                text: 'Tus cambios se guardaron correctamente',
                button: 'OK',
            }).then(() => {
                window.location.reload();
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
                text: 'No pudimos guardar tus cambios o no se realizaron cambios',
            }).then(() => {
                window.location.reload();
            });
        </script>";
    }
?>

<?php
    $script = "<script src='build/js/app.js'></script>"
?>