<?php

    $conex = mysqli_connect('localhost', 'root', 'root', 'suscriptores');
    mysqli_set_charset($conex, "utf8");

    if($conex->connect_error) {
        echo $error -> $conex->connect_error;
    }
?>