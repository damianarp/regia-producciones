<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';

    $id = $_GET['id'];
    
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("Error!!");
    }
?>


<!-- Content Wrapper. Contenido de la página -->
<div class="content-wrapper">
    <div id="caja">
        <div class="caja">
            <h1>
                <a href="../index.php" target=”_blank” title="Regia Producciones"><img src="../img/logo-regia-negro.png"
                    alt="Logo de Regia Producciones"></a>
            </h1>
        </div>
        <?php
            $sql = "SELECT * FROM `articulos` WHERE `id_art` = $id ";
            $resultado = $conn->query($sql);
            $art = $resultado->fetch_assoc();
        ?>

        <!-- Formulario de Posteo de articulos -->
        <form role="form" id="articulo" name="articulo" method="post" action="modelo-articulo.php" enctype="multipart/form-data">
            <input type="text" name="titulo" id="titulo" placeholder="Título del post" value="<?php echo $art['titulo_art']; ?>">
            <div id="error_6"></div>

            <textarea name="descripcion" id="descripcion" placeholder="Descripción del post"><?php echo $art['descripcion_art']; ?></textarea>
            <div id="error_7"></div>

            <span class="imagen">
                <input type="file" name="imagen" id="imagen" required>
            </span>
            <label for="imagen">
                <span>Subir imagen</span>
            </label>
            <div class="form-group">
                <label for="imagen_actual">Imagen Actual</label>
                <br>
                <div id="preview">
                    <img src="admin/img/articulos/<?php echo $art['img_art']; ?>" width="500px">
                </div>
            </div>
            <br>
            <label for="categorias">Categorías</label>
            <select name="categoria" id="categoria">
                <optgroup label="Categorias">
                    <option name="cine" value="1">Cine</option>
                    <option name="peliculas_y_series" value="2">Películas y Series</option>
                    <option name="fotografia_y_video" value="3">Fotografía y Video</option>
                    <option name="diseno" value="4">Diseño</option>
                    <option name="desarrollo_web" value="5">Desarrollo Web</option>
                    <option name="tecnologia" value="6">Tecnología</option>
                    <option name="marketing_digital" value="7">Marketing Digital</option>
                </optgroup>
            </select>
            <br>
            <label for="contenido">Contenido completo del post</label>
            <textarea name="contenido" id="contenido" value=""><?php echo $art['contenido_art']; ?></textarea>
            <div id="error_8"></div>
            <div class="botones">
                
                <div class="boton">
                    <input type="hidden" name="articulo" value="nuevo">
                    <a href="editar-articulo.php?id=" class="btn bg-purple btn-flat margin">
                        <i class="fa fa-save"></i>
                    </a>
                </div>
                <div class="boton">
                    <input type="hidden" name="articulo" value="nuevo">
                    <a href="#" data-id="" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>
            <div class="boton">
                <input type="hidden" name="estado" value="2">
                <input type="hidden" name="id_articulo" value="<?php echo $id; ?>">
                <button type="submit" class="btn bg-black" id="modificar-articulo">Publicar</button>
            </div>
            
        </form> 
                
        <!-- /Formulario de Posteo de articulos -->
    </div>
</div>

<?php include_once 'templates/footer.php';?>