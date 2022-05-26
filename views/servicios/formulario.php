<fieldset>
    <legend class="margin-bottom">Agregar Servicio</legend>
    <div class="inputContainer">
        <input type="text" class="input__modificado input" id="nombre" name="nombre" placeholder="Nombre Servicio" value="<?php echo(Sanitizar($servicio->nombre)) ?>" required onkeypress="return (event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32)">
        <label for="" class="label">Nombre Servicio</label>
    </div>

    <div class="inputContainer">
        <input class="input__modificado input" type="tel" id="precio" name="precio" placeholder="Precio" value="<?php echo($servicio->precio ? number_format(intval(Sanitizar($servicio->precio)), 0, ",", ".") : ''); ?>" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
        <label for="" class="label">Precio</label>
    </div>
</fieldset>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const DECIMALES=".";
        const INFLOCAL = DECIMALES==="."?new Intl.NumberFormat('es-co'):new Intl.NumberFormat('es-co');
        let regexpInteger = new RegExp('[^0-9]', 'g');
        let regexpNumber = new RegExp('[^0-9' + '\\' + DECIMALES + ']', 'g');

        function integerFormatIndistinto(e) {
            if (this.value !== "") {
                let caracterInicial = this.value.substring(0, 1);
                let contenido = caracterInicial === "-" ? this.value.substring(1, this.value.length).replace(regexpInteger, "") : this.value.replace(regexpInteger, "");
                contenido = contenido.length ? INFLOCAL.format(parseInt(contenido)) : "0";
                this.value = contenido.length ? contenido : "0";
                if (caracterInicial === "-") {
                    this.value = caracterInicial + this.value;
                }
            }
            console.log(document.querySelector("#precio").value)
        }

        const precio = document.getElementById("precio");
        precio.addEventListener("keyup", integerFormatIndistinto);
    });
</script>