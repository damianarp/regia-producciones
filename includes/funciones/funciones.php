<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
/**
 * funcion que permite responder con un json a la peticion ajax
 */
function responseJSON($data) {
		header('Content-type:application/json;charset=utf-8');
		echo json_encode($data);
}

?>