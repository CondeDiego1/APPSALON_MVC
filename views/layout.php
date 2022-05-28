<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="initial-scale=1.0, user-scalable=0, width=device-width, height=device-height"/>
    <title>App BarberShop</title>
    <link rel="stylesheet" href="/build/css/app.css">
    <meta name="description" content="Página web de Salon de Belleza">
    <link rel="icon" type="image/png" href="../build/img/icono.png" />
</head>
<body onpaste="return false">
    <div class="contenedor-login"></div>
    <main data-cy="contenedor-login" class="context area">
        <?php if(isset($alertas)){ ?>
            <div class="contenedor-error">
                <?php foreach ($alertas as $key => $alerta) : 
                    foreach ($alerta as $mensaje) :?>
                    <div class="alerta error <?php echo $key ?>">
                        <p><?php if($key == '') {echo "Error";}?></p>
                        <p>
                            <?php echo ($mensaje) ?>
                        </p>
                    </div>
                    <?php endforeach;
                endforeach; ?>
            </div>
        <?php } ?>
        <div class="contenedor seccion login">
            <?php echo $contenido; ?>   
        </div>
    </main>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        document.addEventListener("DOMContentLoaded", function () {
            const notify = document.getElementsByClassName('error');
            const notifyalerta = document.getElementsByClassName('alerta');
            for (i = 0; i < notify.length; i++) {
                if (notify[i]) {
                    setTimeout(function () {
                        for (j = 0; j < notify.length; j++) {
                            notify[j].classList.add("oculto");
                        }
                    }, 9000);
                }
            }
        });
    </script>
    <script src="/build/js/validacion.js" defer></script>
</body>
</html>