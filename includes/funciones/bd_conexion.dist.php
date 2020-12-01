<?php

    // CONEXION CON PDO (es la que se usa actualmente)
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







    // ANTIGUA CONEXION CON MYSQLI
    // $conn = mysqli_connect('localhost', 'root', 'root', 'bd_regia');
    // mysqli_set_charset($conn, "utf8");

    // if($conn->connect_error) {
    //     echo $error -> $conn->connect_error;
    // }
?>