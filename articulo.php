<?php
    include_once 'includes/funciones/bd_conexion.php'; 
    include_once 'includes/funciones/funciones.php'; 
    include_once 'includes/templates/header.php'; 
    
    if(!$_GET) {
        header('Location:blog.php?pagina=1');
    }
    if($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0) {
        header('Location:blog.php?pagina=1');
    }
    
?>

<main>
    <!-- ---------------------- Site Content -------------------------->
    <section class="contenedor" id="blog">
        <div class="site-content">
            <!-- Sección articulos del blog -->
            <div class="posts">


                <?php
                $sql_articulos = "SELECT articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion  
                FROM articulos
                INNER JOIN categorias ON categorias.id_categoria = articulos.categoria_id
                INNER JOIN admins ON admins.id_admin = articulos.admin_id
                INNER JOIN estado ON estado.id_estado = articulos.estado_id
                LEFT JOIN admins as admins2 ON admins2.id_admin = articulos.edicion_admin_id
                GROUP BY articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion
                ORDER BY articulos.id_art";

                $sentencia_articulos = $conexion->prepare($sql_articulos);
                $sentencia_articulos->execute();
                $resultado_articulos = $sentencia_articulos->fetch();

                $articulo = $resultado_articulos;

                ?>

                <?php if($articulo) : ?>
                        <!-- Articulo 1 -->
                        <article class="post-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                    
                                <img src="img/articulos/<?php echo $articulo['img_art']; ?>" width="100%">
                            
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo $articulo['nombre']; ?></span>
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo $articulo['fecha_creacion']; ?></span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#"><?php echo $articulo['titulo_art']; ?></a>
                                <p><?php echo $articulo['contenido_art']; ?></p>
                                <a href="blog.php?pagina=1"><button class="btn post-btn"><i class="fas fa-arrow-left"></i>&nbsp; Volver</button></a>
                            </div>
                        </article>
                        <!-- /Articulo 1 -->
                        <hr>
                <?php endif; ?>
            </div>
            <!-- /Sección articulos del blog --> 
            
            <!-- Aside -->
            <aside class="sidebar">
                <?php
                    $sql_categorias = "SELECT * FROM categorias";

                    $sentencia_categorias = $conexion->prepare($sql_categorias);
                    $sentencia_categorias->execute();
                    $resultado_categorias = $sentencia_categorias->fetchAll();

                ?>
                <!-- Categorias -->
                <div class="category">
                    <h2>Categorías</h2>
                    <ul class="category-list">
                        <?php foreach($resultado_categorias as $categorias): ?>
                            <li class="list-items" data-aos="fade-left" data-aos-delay="100">
                                <a href="#"><?php echo $categorias['nombre_cat']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!-- /Categorias -->
                
                <?php
                    $sql_destacados = "SELECT articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion  
                    FROM articulos
                    INNER JOIN categorias ON categorias.id_categoria = articulos.categoria_id
                    INNER JOIN admins ON admins.id_admin = articulos.admin_id
                    INNER JOIN estado ON estado.id_estado = articulos.estado_id
                    LEFT JOIN admins as admins2 ON admins2.id_admin = articulos.edicion_admin_id
                    GROUP BY articulos.id_art, articulos.titulo_art, articulos.descripcion_art, articulos.contenido_art, articulos.img_art, categorias.nombre_cat, admins.nombre, articulos.fecha_creacion, estado.nombre_estado, articulos.fecha_edicion
                    ORDER BY articulos.id_art  
                    LIMIT 0,5";

                    $sentencia_destacados = $conexion->prepare($sql_destacados);
                    $sentencia_destacados->execute();
                    $resultado_destacados = $sentencia_destacados->fetchAll();

                ?>

                <!-- Articulos Destacados -->
                <div class="popular-post">
                    <h2>Artículos Destacados</h2>

                    <?php foreach($resultado_destacados as $destacados): ?>
                        <!-- Articulo 1 -->
                        <article class="post-content" data-aos="flip-up" data-aos-delay="200">
                            <div class="post-image">
                                <div>
                                <img src="img/articulos/<?php echo $destacados['img_art']; ?>" width="100%">
                                </div>
                                <div class="post-info flex-row">
                                    <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo $destacados['fecha_creacion']; ?></span>
                                </div>
                            </div>
                            <div class="post-title">
                                <a href="#"><?php echo $destacados['titulo_art']; ?></a>
                            </div>
                        </article>
                        <!-- /Articulo 1 -->
                    <?php endforeach; ?>
                    
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