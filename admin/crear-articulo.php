<?php
    include_once 'funciones/sesiones.php';
    include_once 'funciones/funciones.php';
    include_once 'templates/header.php';
    include_once 'templates/barra.php';
    include_once 'templates/navegacion.php';
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

        <!-- Formulario de Posteo de articulos -->
        <form role="form" id="articulo" name="articulo" method="post" action="modelo-articulo.php" enctype="multipart/form-data">
            <input type="hidden" name="submit" value="1">
            <input type="text" name="titulo" id="titulo" placeholder="Título del post">
            <div id="error_6"></div>

            <textarea name="descripcion" id="descripcion" placeholder="Descripción del post"></textarea>
            <div id="error_7"></div>

            <span class="imagen">
                <input type="file" name="imagen" id="imagen" required>
            </span>
            <label for="imagen">
                <span>Subir imagen</span>
            </label>
            <div id="preview"></div>
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
            <textarea name="contenido" id="contenido"></textarea>
            <div id="error_8"></div>
            <!-- <div class="botones">
                
                <div class="boton">
                    <input type="hidden" name="articulo" value="nuevo">
                    <a href="crear-articulo.php?id=" class="btn bg-purple btn-flat margin">
                        <i class="fa fa-save"></i>
                    </a>
                </div>
                <div class="boton">
                    <input type="hidden" name="articulo" value="nuevo">
                    <a href="editar-articulo.php" class="btn bg-orange btn-flat margin">
                        <i class="fa fa-pencil"></i>
                    </a>
                </div>
                <div class="boton">
                    <input type="hidden" name="articulo" value="nuevo">
                    <a href="#" data-id="" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
                  
            </div> -->
            <div class="boton">
                <input type="hidden" name="articulos" value="nuevo">
                <button type="submit" class="btn bg-black" id="crear-articulo">Guardar</button>
                
                <input type="checkbox" id="estado" name="estado" value="1">
                <label for="estado">Publicado</label>

            </div>
            
        </form> 
                
        <!-- /Formulario de Posteo de articulos -->
    </div>
</div>

<?php include_once 'templates/footer.php';?>