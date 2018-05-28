<!DOCTYPE html>
<html>
<head>
	<title>Cliente</title>
	<script type="text/javascript">
	function input(texto)
	{
		if (texto.bus.value.length == 0)
		{
			alert("Completa todos los campos");
			texto.bus.focus()
			return false;
		}
	}
	</script>
</head>
<body>
	<form action="../index.html">
    <input type="submit" value="Volver">
	</form>
 <form method="POST" action="../php/edit_clie.php" onsubmit="return input(this)">
 		<p>Busqueda por documento: <input type="text" name="bus" placeholder="Busqueda"></p>
 		<input type="submit" value="Buscar" name="sub">
 </form>
<?php
include("../php/conexion.php");
echo'<br>
	<table border = "1">
		<tr>
			<th>ID</th>
			<th>Documento</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Telefono</th>
			<th>Email</th>
			<th>Direccion</th>
	    </tr>';

		$fila = mysqli_query($mysqli, "SELECT * FROM cliente");
		While($dat = mysqli_fetch_array($fila))
	    {
	    	echo'
	    		<tr>
	    			<td>'.$dat[0].'</td>
	    			<td>'.$dat[1].'</td>
	    			<td>'.$dat[2].'</td>
	    			<td>'.$dat[3].'</td>
	    			<td>'.$dat[4].'</td>
	    			<td>'.$dat[5].'</td>
	    			<td>'.$dat[6].'</td>	    		
	    		</tr>';
	    }

?>


</body>
</html>
