<?php
include ('conexion.php');
if (isset($_POST['entrar']) && isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['password']) && !empty($_POST['password'])) 
{
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	

	$usu= mysqli_query ($mysqli, "SELECT * FROM  usuario WHERE user = '$usuario' ");
	if (mysqli_num_rows($usu) == true)
	{
		$pas = mysqli_query($mysqli, "SELECT * FROM usuario WHERE pass = '$password'");
		if (mysqli_num_rows($pas)==true)
		{
			$val= mysqli_query($mysqli, " SELECT user, tipo, email FROM usuario ");

			while ($dat = mysqli_fetch_array($val))
			{
				$tip = $dat['tipo'];
				$usr = $dat['user'];
				$email = $dat['email'];

				if ($usuario == $usr)
			{
				switch ($tip) 
				{
					case 'Cliente':
					print '
					<form method="post" action="../cliente/inicio.php">
						<input type="hidden" value="'.$email.'" name="mail">
						<h1>Bienvenido! '.$usr.'</h1>
						<input type="submit" value="Continuar" name="con">
					</form>
					';

					break;

					case 'Empleado':
					print '
					<form method="post" action="../empleado/inicioE.php">
						<input type="text" value="'.$email.'" name="mail">
						<h1>Buen dia '.$usr.', Bienvenido al portal Empleado</h1>
						<input type="submit" value="Continuar" name="con">
					</form>';
					break;
				}
			}
			
			}


		}
			else
			{	
				print 'Escriba su contraseña correctamente';
			}	
	}

	else
	{
		print 'No hay un usuario con este nombre';
	}
}
?>
