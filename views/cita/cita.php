            <header class="header2">
                <h1>Reservas</h1>
            </header>
            <nav class="tabs contenedor">
                <button type="button" data-paso="1">Servicios</button>
                <button type="button" data-paso="2">Información Cliente</button>
                <button type="button" data-paso="3">Resumen</button>
            </nav>
            
            <!-- Inicia Contenido App -->
            <div id="paso-1" class="seccion">
                <p>Elije uno de nuestros servicios disponibles:</p>
                <div id="servicio" class="listado-servicios"></div>
            </div>
            
            <div id="paso-2" class="seccion">
                <p>Elige fecha y hora para tu reserva.</p>
                <form class="formulario-cliente formulario-login">
                    <input type="hidden" class="input__modificado input" id="usuario" name="usuario" value="<?php echo($_SESSION['usuario']); ?>" required readonly>

                    <div class="inputContainer">
                        <input type="text" class="input__modificado input" id="Nombre" name="nombre" placeholder="Nombre Completo" value="<?php echo($_SESSION['nombre']); ?>" required readonly>
                        <label for="" class="label">Nombre Completo</label>
                    </div>

                    <div class="inputContainer">
                        <input type="date" class="input__modificado input" id="fecha" name="fecha" required>
                        <label for="" class="label">Fecha</label>
                    </div>

                    <div class="inputContainer">
                        <input type="time" class="input__modificado input" id="hora" name="hora" required>
                        <label for="" class="label">Fecha</label>
                    </div>

                </form>
            </div>

            <div id="paso-3" class="seccion contenido-resumen">
                <h2>Resumen</h2>
            </div>

            <div class="paginacion">
                <button id="anterior" class="btn-fecla btn-fecha-izquierda">
                    <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                    </svg>
                    <span>Anterior</span>
                </button>

                <button id="siguiente" class="btn-fecla">
                    <span>Siguiente</span>
                    <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                        <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                    </svg>
                </button>
            </div>

            <div class="paginacion">
                <a href="/perfil">
                    <button class="btn-fecla btn-fecha-izquierda">
                        <svg width="34" height="34" viewBox="0 0 74 74" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="37" cy="37" r="35.5" stroke="white" stroke-width="3"></circle>
                            <path d="M25 35.5C24.1716 35.5 23.5 36.1716 23.5 37C23.5 37.8284 24.1716 38.5 25 38.5V35.5ZM49.0607 38.0607C49.6464 37.4749 49.6464 36.5251 49.0607 35.9393L39.5147 26.3934C38.9289 25.8076 37.9792 25.8076 37.3934 26.3934C36.8076 26.9792 36.8076 27.9289 37.3934 28.5147L45.8787 37L37.3934 45.4853C36.8076 46.0711 36.8076 47.0208 37.3934 47.6066C37.9792 48.1924 38.9289 48.1924 39.5147 47.6066L49.0607 38.0607ZM25 38.5L48 38.5V35.5L25 35.5V38.5Z" fill="black"></path>
                        </svg>
                        <span>Inicio</span>
                    </button>
                </a>
            </div>

            <?php
                $script = "<script src='build/js/app.js'></script>"
            ?>

