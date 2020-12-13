<?php
		$page = 'articulo';
    include_once 'includes/funciones/bd_conexion.php'; 
    include_once 'includes/funciones/funciones.php'; 
    include_once 'includes/templates/header.php'; 

    $id = $_GET['id'];
    
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!!");
    }
    

		// a mi me faltaba esto
		// $objeto = new Conexion();
		// $conexion = $objeto->Conectar();

?>

<main>
    <!-- ---------------------- Site Content -------------------------->
    <section class="contenedor" id="blog">
        <div class="site-content">
            <!-- Paginación -->
            <div class="my-5">
                <!-- Sección articulos del blog -->
                <div class="posts">

                <?php 
                    $sql = "SELECT * FROM articulos, admins, categorias
                    WHERE id_art = $id AND articulos.admin_id = admins.id_admin
                    LIMIT 1";
                    $resultado = $conn->query($sql);
                ?>
   
                    <!-- Articulo 1 -->
                    <?php foreach($resultado as $art):?>
                    <article class="post-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                
                            <img src="img/articulos/<?php echo $art['img_art']; ?>" width="100%">
                        
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $art['nombre']; ?></span>
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo $art['fecha_creacion']; ?></span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#"><?php echo $art['titulo_art']; ?></a>
                            <p><?php echo $art['descripcion_art']; ?></p>
                            <a href="blog.php?id=<?php echo $art['id_art'] ?>"><button class="btn post-btn"><i class="fas fa-arrow-left"> &nbsp; Volver</i></button></a>
                        </div>
                    </article>
                    <!-- /Articulo 1 -->
                    <hr>
                    <?php endforeach;?>      
                </div>
                <!-- /Sección articulos del blog --> 
                
            </div>
            <!-- /Paginación -->
            

            <!-- Aside -->
            <aside class="sidebar">

                <!-- Categorias -->
                <div class="category">
                    <h2>Categorías</h2>
                    <ul class="category-list">
                        <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                            <a href="#">Películas y series</a>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="200">
                            <a href="#">Cine</a>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="300">
                            <a href="#">Fotografía</a>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="400">
                            <a href="#">Diseño</a>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="500">
                            <a href="#">Desarrollo Web</a>
                        </li>
                        <li class="list-items" data-aos="fade-left" data-aos-delay="600">
                            <a href="#">Tecnologías</a>
                        </li>
                    </ul>
                </div>
                <!-- /Categorias -->

                <!-- Articulos Destacados -->
                <div class="popular-post">
                    <h2>Artículos Destacados</h2>

                    <!-- Articulo 1 -->
                    <article class="post-content" data-aos="flip-up" data-aos-delay="200">
                        <div class="post-image">
                            <div>
                                <img src="./assets/popular-post/m-blog-1.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;01 de Diciembre de 2020</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Cómo garantiza el Open Source la seguridad informática</a>
                        </div>
                    </article>
                    <!-- /Articulo 1 -->

                    <!-- Articulo 2 -->
                    <article class="post-content" data-aos="flip-up" data-aos-delay="300">
                        <div class="post-image">
                            <div>
                                <img src="./assets/popular-post/m-blog-2.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;23 de Noviembre de 2020</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Las 30 series y películas que desaparecen de Netflix esta semana</a>
                        </div>
                    </article>
                    <!-- /Articulo 2 -->

                    <!-- Articulo 3 -->
                    <article class="post-content" data-aos="flip-up" data-aos-delay="400">
                        <div class="post-image">
                            <div>
                                <img src="./assets/popular-post/m-blog-3.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;19 de Noviembre de 2020</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">16 Trucos de diseño gráfico para estar entre los mejores</a>
                        </div>
                    </article>
                    <!-- /Articulo 3 -->

                    <!-- Articulo 4 -->
                    <article class="post-content" data-aos="flip-up" data-aos-delay="500">
                        <div class="post-image">
                            <div>
                                <img src="./assets/popular-post/m-blog-4.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;15 de Noviembre de 2020</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Juana Viale pudo terminar el rodaje de Causalidad, su nueva película, postergada por la pandemia</a>
                        </div>
                    </article>
                    <!-- /Articulo 4 -->

                    <!-- Articulo 5 -->
                    <article class="post-content" data-aos="flip-up" data-aos-delay="600">
                        <div class="post-image">
                            <div>
                                <img src="./assets/popular-post/m-blog-5.jpg" class="img" alt="blog1">
                            </div>
                            <div class="post-info flex-row">
                                <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;09 de Noviembre de 2020</span>
                            </div>
                        </div>
                        <div class="post-title">
                            <a href="#">Elliot Page: la estrella de la película "Juno" anuncia que es transgénero</a>
                        </div>
                    </article>
                    <!-- /Articulo 5 -->
                </div>
                <!-- /Articulos Destacados -->

                <!-- Newsletter -->
                <div class="newsletter" data-aos="fade-up" data-aos-delay="300">
                    <h2>Newsletter</h2>
                    <form class="form-element" id="suscripcion" name="suscripcion">
                        <input type="hidden" name="submit" value="1">
                        <input type="text" class="input-element" name="name" id="name" placeholder="Nombre completo">
                        <div id="error_4"></div>
                        <input type="email" class="input-element" name="mail" id="mail" placeholder="Correo electrónico">
                        <div id="error_5"></div>
                        <input id="suscribir" class="transparente" type="button" value="Suscribite!">
                    </form>
                </div>
                <!-- /Newsletter -->

                <!-- Etiquetas Populares -->
                <div class="popular-tags">
                    <h2>Tags Populares</h2>
                    <div class="tags flex-row">
                        <span class="tag" data-aos="flip-up" data-aos-delay="100">Software</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="200">Cine</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="300">Diseño</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="400">Cine</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="500">Películas</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="600">Desarrollo Web</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="700">Fotografía</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="800">Video</span>
                        <span class="tag" data-aos="flip-up" data-aos-delay="900">Tecnología</span>
                    </div>
                </div>
                <!-- /Etiquetas Populares -->
            </aside>
            <!-- /Aside -->
        </div>
    </section>
    <!-- -----------x---------- Site Content -------------x------------>
</main>

<?php include_once 'includes/templates/footer.php'; ?>