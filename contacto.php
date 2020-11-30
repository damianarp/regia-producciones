<?php 

    $page ='contacto'; 

    include_once 'includes/templates/header.php';
    include("bd_conexion.php"); 
    
?>



    <!-- Contacto -->
    <main>
        <section class="contenedor img-box" id="contacto">
            <div class="info-container">
                <div class="contenedor-img">
                    <div class="formulario-title">
                        <h2>Formulario de contacto</h2> 
                    </div>
                    <div class="formulario-content">
                    <form id="formulario" action="contactar.php" method="post" name="formulario">
                        <label for="nombre">Nombre: </label>
                        <input type="text" id="nombre" name="nombre" placeholder="Ingresá tu nombre">
                        <div id="error_1"></div>

                        <label for="apellido">Apellido: </label>
                        <input type="text" id="apellido" name="apellido" placeholder="Ingresá tu apellido">
                        <div id="error_2"></div>

                        <label for="correo">Correo Electrónico: </label>
                        <input type="email" id="correo" name="correo" placeholder="Ingresá tu correo electrónico">
                        <div id="error_3"></div>

                        <label for="mensaje">Escribí tu mensaje: </label>
                        <textarea name="mensaje" id="mensaje"></textarea>

                        <input class="send" type="submit" id="enviado" name="submit" value="Enviar">
                        <div class="mensaje-form">
                            <p>Dejanos tu mensaje! Con gusto te responderemos a la brevedad!</p>
                        </div>
                        
                    </form>
                    <div id="miAreaDeRespuesta"></div>
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
