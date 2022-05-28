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
    <header class="header">
        <div class="contenedor contenido-header">
            <a href="index.php">
                <h1>BarberShop</h1>
            </a>
            <nav class="navegacion-principal">
                <a href="#servicios">Servicios</a>
                <a href="#empleados">Barberos</a>
                <a href="#contacto">Contacto</a>
            </nav>
        </div>
    </header>

    <div class="presentacion">
            <div class="contenedor overlay-presentacion">
                <h2>welcome to the barberia</h2>
                <p class="margin">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis sunt non quae
                    Lorem
                </p>
            </div><!-- .overlay-presentacion -->
            <div class="contenedor overlay-informacion">
                <section class="detalle">
                    <a href="#horarios">
                        <picture>
                        <source loading="lazy" srcset="/build/img/clock_100px.webp" type="image/webp">
                        <img src="/build/img/clock_100px.png" alt="imagen reloj" loading="lazy">
                    </picture>
                    <div>
                        <h3 class="no-margin">Horario</h3>
                        <p class="no-margin text-justify">9am-7pm</p>
                    </div>
                    </a>
                </section>
                <section class="detalle">
                    <a href="#contacto">
                        <picture>
                            <source loading="lazy" srcset="/build/img/phone_100px.webp" type="image/webp">
                            <img src="/build/img/phone_100px.png" alt="imagen telefono">
                        </picture>
    
                        <div>
                            <h3 class="no-margin">Contacto</h3>
                            <p class="no-margin text-justify">Información</p>
                        </div>
                    </a>
                </section>
                <section class="detalle">
                    <a href="#">
                        <picture>
                        <source loading="lazy" srcset="/build/img/place_marker_100px.webp" type="image/webp">
                        <img src="/build/img/place_marker_100px.png" alt="imagen ubicacion" loading="lazy">
                    </picture>
                    <div>
                        <h3 class="no-margin">Ubicación</h3>
                        <p class="no-margin text-justify">Medellín</p>
                    </div>
                    </a>  
                </section>
            </div><!-- .overlay-informacion -->
        <!-- <img src="build/img/presentacion4.jpg" alt=""> -->
    </div><!-- .presentacion -->

    <section id="servicios" class="servicios">
        <div class="contenedor">
            <h2>Nuestros Servicios</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <div class="contenedor-servicios">
                <div class="corte">
                    <h3 class="cortes corte-cabello">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="corte">
                    <h3 class="cortes corte-barba">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="corte">
                    <h3 class="cortes mascarilla">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="corte">
                    <h3 class="cortes mascarilla">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="corte">
                    <h3 class="cortes mascarilla">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
                <div class="corte">
                    <h3 class="cortes mascarilla-cera">Corte Básico</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                </div>
            </div><!-- .contenedor-servicios -->
            <a href="/login" class="main_div">
                <button>Reservar</button>
            </a>
            
        </div>
    </section><!-- .servicios -->

    <div id="horarios" class="horarios">
        <div class="overlay">
            <div class="contenedor">
                <h2>Horarios</h2>
                <p class="overlay-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio libero
                    quasi, asperiores nisi numquam
                    saepe soluta</p>
                <div class="contenedor-dias">
                    <ul>
                        <li>
                            Lunes
                            <p>9am</p>
                            <p>-</p>
                            <p>7pm</p>
                        </li>
                        <li>Martes
                            <p>9am</p>
                            <p>-</p>
                            <p>7pm</p>
                        </li>
                        <li>Miércoles
                            <p>9am</p>
                            <p>-</p>
                            <p>7pm</p>
                        </li>
                        <li>Jueves
                            <p>9am</p>
                            <p>-</p>
                            <p>7pm</p>
                        </li>
                        <li>Viernes
                            <p>9am</p>
                            <p>-</p>
                            <p>7pm</p>
                        </li>
                        <li>Sábado
                            <p>11am</p>
                            <p>-</p>
                            <p>5pm</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- .horarios -->

    <div class="galeria">
        <div class="contenedor">
            <h2>Galería</h2>
            <div class="contenedor-galeria">
                <picture>
                    <!-- <source loading="lazy" srcset="build/img/1.webp" type="image/webp"> -->
                    <img src="/build/img/1.jpg" alt="imagen1 galeria">
                </picture>
                <picture>
                    <!-- <source loading="lazy" srcset="build/img/2.webp" type="image/webp"> -->
                    <img src="/build/img/2.jpg" alt="imagen2 galeria">
                </picture>
                <picture>
                    <!-- <source loading="lazy" srcset="build/img/3.webp" type="image/webp"> -->
                    <img src="/build/img/3.jpg" alt="imagen3 galeria">
                </picture>
                <picture>
                    <!-- <source loading="lazy" srcset="build/img/4.webp" type="image/webp"> -->
                    <img src="/build/img/4.jpg" alt="imagen4 galeria">
                </picture>
            </div>
        </div>
        <div class="overlay"></div>
    </div>

    <section id="empleados" class="empleados">
        <div class="overlay"></div>
        <div class="contenedor-empleados contenedor">
            <h2>Empleados</h2>
            <div class="empleados-detalle">
                <div>
                    <picture>
                        <source loading="lazy" srcset="/build/img/Empleado1.webp" type="image/webp">
                        <img class="empleados__detalle empleados__detalle--izquierda" src="/build/img/Empleado1.jpg" alt="empleado_1" loading="lazy">
                    </picture>
                    <p>Richard Freud</p>
                    <div class="empleados-redes">
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes1.webp" type="image/wepb">
                                <img src="/build/img/redes1.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes2.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes2.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes3.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes3.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes4.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes4.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                    </div>
                </div>
                <div>
                    <picture>
                        <source loading="lazy" srcset="/build/img/Empleado2.webp" type="image/webp">
                        <img class="empleados__detalle empleados__detalle--centro" src="/build/img/Empleado2.jpg"
                            alt="empleado_2" loading="lazy">
                    </picture>
                    <p>Victoria Botet</p>
                    <div class="empleados-redes">
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes1.webp" type="image/wepb">
                                <img src="/build/img/redes1.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes2.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes2.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes3.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes3.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes4.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes4.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                    </div>
                </div>
                <div>
                    <picture>
                        <source loading="lazy" srcset="/build/img/Empleado3.webp" type="image/webp">
                        <img class="empleados__detalle empleados__detalle--derecha" src="/build/img/Empleado3.jpg"
                            alt="empleado_3" loading="lazy">
                    </picture>

                    <p>Carlos Kash</p>
                    <div class="empleados-redes">
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes1.webp" type="image/wepb">
                                <img src="/build/img/redes1.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes2.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes2.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes3.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes3.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                        <a href="#">
                            <picture>
                                <source loading="lazy" srcset="/build/img/redes4.webp" type="image/wepb">
                                <img href="#" src="/build/img/redes4.png" alt="imagen facebook" loading="lazy">
                            </picture>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="contacto" class="contacto">
        <div class="contenedor">
            <div class="contenedor-contacto">
                <div>
                    <h3>Contacto</h3>
                    <p>Medellín, Colombia</p>
                    <p>0123456789</p>
                    <p>barbershop@gmail.com</p>
                    <iframe  title="Ubicación BarberShop" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126916.74073834631!2d-75.65125211985116!3d6.244198821316636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428dfb80fad05%3A0x42137cfcc7b53b56!2sMedell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1650747286040!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div>
                    <h3 class="margin-top">Escríbenos</h3>
                    <form id="formulario">
                        <div class="campos-validacion">
                            <input class="campo campo-validacion" name="nombre" id="nombre" type="text" placeholder="Nombre"  required onkeypress="return (event.charCode >= 65 && event.charCode <= 90 || event.charCode >= 97 && event.charCode <= 122 || event.charCode == 32)">
                            <span class="correcto campo__correcto--nombre"></span>
                            <span class="campo__incorrecto--nombre"></span>
                        </div>
                        <div class="campos-validacion">
                            <input class="campo campo-validacion" name="correo" id="correo" type="email" placeholder="Correo" required>
                            <span class="correcto campo__correcto--correo"></span>
                            <span class="campo__incorrecto--correo"></span>
                        </div>
                        <div class="campos-validacion">
                            <input class="campo campo-validacion" name="telefono" id="telefono" type="tel" placeholder="Teléfono" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" maxlength="10" minlength="10" required>
                            <span class="correcto campo__correcto--telefono"></span>
                            <span class="campo__incorrecto--telefono"></span>
                        </div>
                        <div>
                            <textarea class="campo campo-field" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="main_div">
                            <input type="submit" value="Enviar" class="boton">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="boton-Top">
        <img src="/build/img/upward_arrow_120px.webp" alt="boton subir">
    </div>

    <footer class="footer">
        <div class="contenedor">
            <div class="footer__networks">
                <a href="#" class="iconos">
                    <picture>
                        <source loading="lazy" srcset="/build/img/facebook_2.webp" type="image/webp">
                        <img src="/build/img/facebook_2.png" alt="imagen facebook" loading="lazy">
                    </picture>
                </a>
                <a href="#" class="iconos">
                    <picture>
                        <source loading="lazy" srcset="/build/img/twitter_2.webp" type="image/webp">
                        <img src="/build/img/twitter_2.png" alt="imagen twitter" loading="lazy">
                    </picture></i>
                </a>
                <a href="#" class="iconos">
                    <picture>
                        <source loading="lazy" srcset="/build/img/gmail_2.webp" type="image/webp">
                        <img src="/uild/img/gmail_2.png" alt="imagen gmail" loading="lazy">
                    </picture></i>
                </a>
                <!-- href="mailto:correo@gmail.com" -->
                <a href="#" class="iconos">
                    <picture>
                        <source loading="lazy" srcset="/build/img/whatsapp_2.webp" type="image/webp">
                        <img src="/build/img/whatsapp_2.png" alt="imagen whatsapp" loading="lazy">
                    </picture></i>
                </a>
                <a href="#" class="iconos">
                    <picture>
                        <source loading="lazy" srcset="/build/img/instagram_2.webp" type="image/webp">
                        <img src="/build/img/instagram_2.png" alt="imagen instagram" loading="lazy">
                    </picture></i>
                </a>
            </div><!-- .footer__networks -->
            <div class="contenedor derechos">
                <p class="copyright">Copyright &copy; all rights reserved 2022.</p>
                <p>Developed with<img class="corazon" src="/build/img/heart.svg" alt="Imagen corazon">by Diego Conde López.</p>
            </div>
        </div>
    </footer><!-- .footer -->

    <script src="/build/js/validacion.js" defer></script>
</body>

</html>