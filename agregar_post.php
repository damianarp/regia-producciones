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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/styles-agregar-post.css">

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: "#contenido",height: 500,width: "100%",statusbar: false,menubar: false, language : "es",plugins: ["advlist autolink autosave link image lists charmap preview hr anchor spellchecker","searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking","table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"],toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | cut copy paste | bullist numlist | outdent indent | undo redo | link unlink image media | preview | forecolor backcolor | formatselect",toolbar3: "subscript superscript | emoticons",toolbar_items_size: 'small',content_css: ['//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css','//www.tinymce.com/css/codepen.min.css']});</script>


    <meta name="theme-color" content="#fafafa">
</head>

<body>
    <div id="caja">
        <img src="img/logo-regia-negro.png" alt="">
        <form action="procesa_agregar_post" method="POST" enctype="multipart/form-data">
            <input type="text" name="titulo" id="" placeholder="Título del post">
            <textarea name="descripcion" id="descripcion" placeholder="Descripción del post"></textarea>
            <label for="imagen">Subir imagen</label>
            <input type="file" name="imagen" id="imagen">
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
            <input type="submit" value="Agregar post">
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
    <script src="js/main.js"></script>
    
</body>
</html>