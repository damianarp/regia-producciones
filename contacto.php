<?php $page ='contacto'; include_once 'includes/templates/header.php'; ?>
    </header>


    <!-- Contacto -->
    <main>
        <section class="contenedor img-box" id="contacto">
            <div class="info-container">
                <div class="contenedor-img">
                    <div class="formulario-title">
                        <h2>Formulario de contacto</h2> 
                    </div>
                    <div class="formulario-content">
                    <form id="formulario">
                        <label for="nombre">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingresá tu nombre">

                        <label for="apellido">Apellido: </label>
                        <input type="text" id="apellido" name="apellido" placeholder="Ingresá tu apellido">

                        <label for="email">Correo Electrónico: </label>
                        <input type="email" id="email" name="email" placeholder="Ingresá tu correo electrónico">

                        <label for="mensaje">Escribí tu mensaje: </label>
                        <textarea name="mensaje" id="mensaje"></textarea>
                        <div class="send"><button type="submit" id="enviado">Enviar</button></div>
                        <div class="mensaje-form">
                            <p>Dejanos tu mensaje! Con gusto te responderemos a la brevedad!</p>
                        </div>
                        <div id="error"></div>
                    </form>
                    <br>
                    <p class="donacion">Te gustaría ser parte de alguna producción nuestra? Ayudanos a financiar nuestros próximos proyectos con tu donación y estarás colaborando como Productor Asociado!</p>
                    <form action="https://www.paypal.com/donate" method="post" target="_top" class="donacion">
                        <input type="hidden" name="hosted_button_id" value="FN9822CFTK26J" />
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                        <img alt="" border="0" src="https://www.paypal.com/en_AR/i/scr/pixel.gif" width="1" height="1" />
                    </form>
                        
                </div>
                </div>
            </div>
        </section>
    </main>

<?php include_once 'includes/templates/footer.php'; ?>