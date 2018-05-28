<?php
$mysqli = new mysqli ('localhost','root','','weat_co'); 
if ($mysqli->connect_error) {
	die('error en la conexion'. $mysqli->connect_error);
}
?>