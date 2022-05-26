<div class="flex">
    <?php include __DIR__ . '/publicidad.php'; ?>

    <div class="flex-formulario">
        <form data-cy="formulario-login" class="formulario-login" method="POST" action="/login" autocomplete="off">
            <fieldset>
                <legend>Iniciar Sesión</legend>
                <picture>
                    <source class="imagen-login" loading="lazy" srcset="/build/img/login.avif" type="image/avif">
                    <source class="imagen-login" loading="lazy" srcset="/build/img/login.webp" type="image/webp">
                    <img class="imagen-login" src="/build/img/login.png" alt="imagen login" loading="lazy">
                </picture>

                
                <input data-cy="input-email" class="input__modificado" type="email" id="email" name="email" placeholder="Email" value="<?php echo ($email !== '' ? $email : '') ?>" onkeypress="return (event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode != 32 || event.charCode >= 48 && event.charCode <= 57 || event.charCode == 45 || event.charCode == 46 || event.charCode == 95)" maxlength="60" required autocomplete="off">
                <div class="contenedor-ver">
                    <input data-cy="input-password" class="input__modificado" type="password" id="contraseña" name="password"  placeholder="Contraseña" required autocomplete="off" onkeypress="return (event.charCode != 32)" maxlength="20">
                    <label data-cy="vercontraseña" onclick="myFunction()" for="vercontraseña">
                        <img id="control" src="" alt="imagen login">
                    </label>
                </div>
            </fieldset>
            <div class="contenedor-div"> 
                <button class="btn-fecla">
                    <span>Iniciar Sesión</span>
                    <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                    </svg>
                </button>
                <div class="no-gap">
                    <a href="/forgot">¿Perdiste tu contraseña?</a>
                    <a href="/create_account"> ¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
        </form>
        <div class="contenedor-boton">
            <a href="/">
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
</div>

<script>
    var x = document.getElementById("contraseña");
    const control = document.getElementById("control");
    if (x.type === "password") {
        control.src = "/build/img/visible48.png";
    } else {
        control.src = "/build/img/ojo48.png";
    }
    function myFunction() {
        var x = document.getElementById("contraseña");
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