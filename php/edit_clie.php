<?php
include ('../php/conexion.php');
if(isset($_POST['sub']) && isset($_POST['bus']))
{
	$bus = $_POST['bus'];
	$fila = mysqli_query($mysqli, "SELECT * FROM cliente WHERE doc_clie = '$bus'");
	
	while ($doc = mysqli_fetch_array($fila))
	{
		print '
		<form action="../tablas/cliente.php">
   		<input type="submit" value="Volver">
  		</form>
<table border="2">
	<tr>
		<th>ID</th>
		<th>Documento</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Telefono</th>
		<th>Email</th>
		<th>Direccion</th>
	</tr>
	<tr>
		<td>'.$doc[0].'</td>
		<td>'.$doc[1].'</td>
		<td>'.$doc[2].'</td>
		<td>'.$doc[3].'</td>
		<td>'.$doc[4].'</td>
		<td>'.$doc[5].'</td>
		<td>'.$doc[6].'</td>
</table>
		';
	}

}
?>