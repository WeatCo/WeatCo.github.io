
<!DOCTYPE html>
<html>
<head>
	<title>Empleado</title>
<script type="text/javascript">
function check(fun)
{ 
    if (fun.txt.value.length==0)
    { 
       alert("Se Deben llenar los campos") 
       fun.txt.focus() 
       return false; 
    } 
}
</script>
</head>
<body>

<?php
include ("../php/conexion.php");
echo'
<form action="../index.html">
    <input type="submit" value="Volver">
</form>

<form onsubmit="return check(this)"method="post" action="../php/edit_emp.php">
    <p>Busqueda por documento:<input type="text" value="" name="txt"></p>
    <input type="submit" name="sub"value="Buscar">
</form>
<br>
  <table border="1">
     <tr>
        <th>ID</th>
        <th>Documento</th>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>Direccion</th>
        <th>ARL</th>
        <th>EPS</th>
        <th>Localidad</th>
        <th>Estado</th>
     </tr>';

     $fila = mysqli_query($mysqli, "SELECT * FROM empleado");
     while($dat = mysqli_fetch_array($fila))
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
     	 		<td>'.$dat[7].'</td>';
                $arl= mysqli_query($mysqli,"SELECT nom_arl FROM arl WHERE id_arl = '$dat[8]'");
                while ($dat_arl=mysqli_fetch_array($arl)) {
                print'<td>'.utf8_encode($dat_arl['nom_arl']).'</td>';    
                }
                $eps= mysqli_query($mysqli,"SELECT nom_eps FROM eps WHERE id_eps= '$dat[9]'");
                while ($dat_eps= mysqli_fetch_array($eps)) {
                print'<td>'.utf8_encode($dat_eps['nom_eps']).'</td>';    
                }
     	 		print'
     	 		<td>'.$dat[10].'</td>';
                if ($dat[11] == 1)
                    print'
                <td>'.$dat[11].'</td>';
                else
                    print '<td>Inactivo</td>';'
     	 	</tr>';
     }
     ?>
    </body>
</html>