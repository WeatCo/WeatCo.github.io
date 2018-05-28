<?php 
session_start();
include ('../php/conexion.php');
if (isset($_POST['con']) && isset($_POST['mail']) && !empty($_POST['mail']))
	{
		$email = $_POST['mail'];

		$cli = $mysqli -> query( "SELECT * FROM cliente WHERE email_clie = '$email'");
		$usr = $mysqli -> query("SELECT * FROM usuario WHERE email = '$email'");

while (($var = mysqli_fetch_array($cli)) && ($var1 = mysqli_fetch_array($usr)))
{
	 
	print 'Hola '.$var[2].' '.$var[3].' Bienvenido a weat_co, donde puede realizar tus pedidos de la mejor pasta para deleitar su paladar';
	

}
	}
?>