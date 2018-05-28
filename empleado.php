<?php include('php/conexion.php'); ?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta lang="esp">
		<title></title>
	</head>
	<body>
	<form method="POST" action="registro/empleado.php">

			<p>Documento:<input type="text" name="doc" ></p>
			<p>Cargo:<select name="tip">
				<option>Elije una opción</option>
				<option value="Domiciliario">Domiciliario</option>
				<option value="Administrador">Administrador</option>
				<option value="Otro">Otro</option>
			</select></p>
			<p>ARL
			<select name="arl">
			<option>Elija su ARL</option>
			<?php
				
				$arl = mysqli_query($mysqli, "SELECT * FROM arl");
				$id = 1;
				while ($dat = mysqli_fetch_array($arl))
				{
					
					echo '						
						<option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
						$id++;		
						}				
			?>
			</select></p>
			<p>Nombres:<input type="text" name="nom"></p>
			<p>Apellidos:<input type="text" name="ape"></p>
			<p>Telefono:<input type="text" name="tel"></p>
			<p>Email:<input type="text" name="email"></p>
			<p>Direccion:<input type="text" name="dir"></p>
			<p>EPS:
				<select name="eps">
					<option>Elije EPS</option>
					<?php				
						$eps = mysqli_query($mysqli, "SELECT * FROM eps");
						$id = 1;
						while ($dat = mysqli_fetch_array($eps))
						{
						
							echo '						
								<option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
								$id++;		
						}				
					?>				
				</select></p>
			<p>Localidad:
				<select name="loc">
					<option>Elije Localidad</option>
					<?php				
						$loc = mysqli_query($mysqli, "SELECT * FROM localidad");
						$id = 1;
						while ($dat = mysqli_fetch_array($loc))
						{
						
							echo '						
								<option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
								$id++;		
						}				
					?>	
			</select></p>
			<p>Usuario:<input type="text" name="usu"></p>
			<p>Contraseña:<input type="password" name="clave"></p>
			<p>Repetir Contraseña:<input type="password" name="Rclave"></p>
			<p><input type="submit" name="enviar" value="enviar"></p>
	</form>
	</body>
</html>