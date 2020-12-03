<!DOCTYPE html>
<html class="no-js" lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Post - Regia Producciones</title>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,nofollow" />
    <meta name="googlebot" content="noindex, nofollow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="noindex, nofollow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">


    <!-- Place favicon.ico in the root directory -->
    <!-- Favicon 32x32-->
    <link rel="icon" type="image/png" href="img/logo-r-negro32.png">

    <!-- Apple -->
    <link rel="apple-touch-icon-precomposed" href="img/logo-r-negro32.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="logo-r-negro72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="logo-r-negro114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="logo-r-negro144.png">

    <!-- Multi-language support -->
    <link rel="alternate" href="https://regiaproducciones.com" hreflang="es" />
    <link rel="alternate" href="https://regiaproducciones.com/en/" hreflang="en" />
    <meta property="og:locale:alternate" content="en_US" />

    <!-- Estilos -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize_reset.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/dropzone.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-agregar-post.css">

    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div id="caja">
        <h1 class="logo-box">
            <a href="index.php" target=”_blank” title="Regia Producciones"><img src="img/logo-regia-negro.png"
                    alt="Logo de Regia Producciones"></a>
            <span class="btn-menu"><i class="fas fa-bars"></i></span>
        </h1>
        <form id="postear" name="postear" enctype="multipart/form-data">
            <input type="hidden" name="submit" value="1">
            <input type="text" name="titulo" id="titulo" placeholder="Título del post">
            <textarea name="descripcion" id="descripcion" placeholder="Descripción del post"></textarea>
            <span class="imagen">
                <input type="file" name="imagen" id="imagen">
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
            </select><br>
            <label for="contenido">Contenido completo del post</label>
            <textarea name="contenido" id="contenido"></textarea>
            <input id="agregar_post" type="button" value="Agregar post">
        </form>
    </div>
    








<!-- Scripts -->
    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="https://kit.fontawesome.com/83447e3cc1.js" crossorigin="anonymous"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/dropzone.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Muestra el nombre del archivo cargado -->
    <script type="application/javascript">
        jQuery('input[type=file]').change(function(){
        var filename = jQuery(this).val().split('\\').pop();
        var idname = jQuery(this).attr('id');
        console.log(jQuery(this));
        console.log(filename);
        console.log(idname);
        jQuery('span.'+idname).next().find('span').html(filename);
        });
    </script>
    
</body>
</html>