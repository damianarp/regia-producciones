<?php

    // CONEXION CON METODO PDO para la Web
    class Conexion {
        public static function Conectar() {
            define('servidor','localhost');
            define('nombre_bd','nombre_bd');
            define('usuario','root');
            define('password','root');

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try {
                $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);
                return $conexion;
            } catch (Exception $e){
                die("El error de Conexion es: ".$e->getMessage());
            }
        }
    }

    // CONEXION CON METODO MYSQLI para el Area Administrativa
    $conn = mysqli_connect('localhost', 'root', 'root', 'nombre_bd');
    mysqli_set_charset($conn, "utf8");

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>