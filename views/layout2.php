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
<body>
    <div class="contenedor-estetica">
        <div class="imagen">
            <div class="overlay"></div>
        </div>
        <div class="app contenedor">
            <?php echo $contenido; ?>   
        </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        echo $script ?? '';
    ?>
</body>
</html>  
