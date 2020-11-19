<!DOCTYPE html>
<html class="no-js" lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description"
        content="Creamos contenidos audiovisuales, tanto en fotografía como en video y brindamos servicios digitales como creación de páginas webs. Somos comunicadores audiovisuales">
    <meta name="keywords"
        content="comunicacion digital, comunicación audiovisual, cine, creacion de contenido, desarrollo web, creacion de sitios web, agencia audiovisual, gestion de redes sociales, peliculas, videoclips, fotografía de producto">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regia Producciones</title>

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

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize_reset.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/lightbox.css">

    <meta name="theme-color" content="#fafafa">
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <!-- Ir arriba -->
    <div class="ir-arriba">
        <a href="#header"><span><i class="fas fa-angle-up"></i></span></a>
    </div>

    <!-- Menú de Navegación -->
    <header id="header">
        <nav class="menu" id="menu">
            <h1 class="logo-box">
                <a href="index.php" title="Regia Producciones"><img src="img/logo-regia-negro.png"
                        alt="Logo de Regia Producciones"></a>
                <span class="btn-menu"><i class="fas fa-bars"></i></span>
            </h1>
            <div class="list-container">
                <ul class="lists">
                    <li><a href="index.php" class="<?php if($page=='inicio'){echo 'activo';} ?>">Inicio</a></li>
                    <li><a href="nosotros.php" class="<?php if($page=='nosotros'){echo 'activo';} ?>">Nosotros</a></li>
                    <li><a href="proyectos.php" class="<?php if($page=='proyectos'){echo 'activo';} ?>">Proyectos</a></li>
                    <li><a href="servicios.php" class="<?php if($page=='servicios'){echo 'activo';} ?>">Servicios</a></li>
                    <li><a href="blog/index.php" class="<?php if($page=='blog'){echo 'activo';} ?>">Blog</a></li>
                    <li><a href="contacto.php" class="<?php if($page=='contacto'){echo 'activo';} ?>">Contacto</a></li>
                </ul>
            </div>

        </nav>
   