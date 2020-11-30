<?php

    $conn = mysqli_connect('localhost', 'root', 'root', 'bd_registro_regia');
    mysqli_set_charset($conn, "utf8");

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>