
<h1>Confirma tu cuenta</h1>
<?php if(isset($errores)){ ?>
    <?php foreach ($errores as $key => $error) : 
        foreach ($error as $mensaje) :?>
            <p class="<?php echo $key; ?>"><?php echo ($mensaje) ?></p>
        <?php endforeach;
    endforeach;
    // echo "<script>
    // function login(){
    //     location.href= '/login';
    // }
    // setTimeout(login, 10000);
    // </script>";
}