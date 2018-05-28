<?php
	include ('../php/conexion.php');
	if(isset($_POST['reg']) && isset($_POST['doc']) && !empty($_POST['doc']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['ape']) && !empty($_POST['ape']) && isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['ema']) && !empty($_POST['ema']) && isset($_POST['dir']) && !empty($_POST['dir']) && isset($_POST['usr']) && !empty($_POST['usr']) && isset($_POST['cla']) && !empty($_POST['cla']) && isset($_POST['cla0']) && !empty($_POST['cla0']))
	{	
		$doc = $_POST['doc'];
		$nom = $_POST['nom'];
		$ape = $_POST['ape'];
		$tel = $_POST['tel'];
		$ema = $_POST['ema'];
		$dir = $_POST['dir'];
		$usr = $_POST['usr'];
		$cla = $_POST['cla'];
		$cla0 = $_POST['cla0'];			

		if($cla == $cla0){
			$queryCliente=$mysqli -> query ("INSERT INTO cliente (doc_clie,nom_clie, ape_clie,tel_clie,email_clie,dir_clie) VALUES ('$doc','$nom','$ape','$tel','$ema','$dir')");
			$queryUsuario=$mysqli -> query ("INSERT INTO usuario (user,pass,email,tipo) VALUES('$usr','$cla','$ema','Cliente')");
		  header("Location:registrado.php");
			die();				
		}

	else
	{
		header('location:error.php');
	}
		
	 }

?>
