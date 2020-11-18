<?php

    $conn = new mysqli('localhost', 'root', 'root', 'bd_regia');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>