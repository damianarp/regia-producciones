<?php include_once 'includes/templates/header_post.php'; ?>

<body>
    <div id="caja">
        <div class="caja">
            <h1>
                <a href="index.php" target=”_blank” title="Regia Producciones"><img src="img/logo-regia-negro.png" alt="Logo de Regia Producciones"></a>
            </h1>
        </div>

        <form id="postear" name="postear" enctype="multipart/form-data">
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
            <br>
            <label for="categorias">Categorías</label>
            <select name="categoria" id="">
                <optgroup label="Categorias">
                    <option value="Películas y series">Películas y series</option>
                    <option value="Fotografía">Fotografía</option>
                    <option value="Diseño">Diseño</option>
                    <option value="Desarrollo Web">Desarrollo Web</option>
                    <option value="Tecnología">Tecnología</option>
                    <option value="Video">Video</option>
                    <option value="Marketing Digital">Marketing Digital</option>
                </optgroup>
            </select>
            <br>
            <label for="contenido">Contenido completo del post</label>
            <textarea name="contenido" id="contenido"></textarea>
            <div id="error_8"></div>

            <input id="agregar_post" type="button" value="Agregar post">
        </form>
    </div>
    
<?php include_once 'includes/templates/footer_post.php'; ?>    
