<?php
include ('../php/conexion.php');
if (isset($_POST['txt']) && isset($_POST['sub']))
{
  $txt = $_POST['txt'];
  $fila = mysqli_query($mysqli, "SELECT * FROM empleado WHERE doc_emp = '$txt'");


    if (mysqli_num_rows($fila) == true)
    {
        print '
        <form method="POST" action="../crud/empleado.php" name="editar">
        <input type="hidden" name="txt" value='.$txt.'>';
              while($dat = mysqli_fetch_array($fila))
        {
          print '<br><br>
            <table border=1>
          <tr>
              <th>ID</th>
              <th>Documento</th>
              <th>Tipo</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>ARL</th>
              <th>EPS</th>
              <th>Localidad</th>
              <th>Estado</th>
          </tr>
          <tr>
          <td>'.$dat[0].'</td>
          <td>'.$dat[1].'</td>
          <td>'.$dat[2].'</td>
          <td>'.$dat[3].'</td>
          <td>'.$dat[4].'</td>
          <td>'.$dat[5].'</td>
          <td>'.$dat[6].'</td>
          <td>'.$dat[7].'</td>';    
          $arl= mysqli_query($mysqli, "SELECT * FROM arl WHERE id_arl ='$dat[8]'");
          while ($dat_arl= mysqli_fetch_array($arl)) {
            print'<td>'.utf8_encode($dat_arl['nom_arl']).'</td>';
          }
          $eps =mysqli_query($mysqli, "SELECT * FROM eps WHERE id_eps='$dat[9]'");
          while ($dat_eps= mysqli_fetch_array($eps)) {
           print'<td>'.utf8_encode($dat_eps['nom_eps']).'</td>';
          }
          $loc= mysqli_query($mysqli, "SELECT * FROM localidad WHERE id_loc ='$dat[10]'");
          while ($dat_loc= mysqli_fetch_array($loc)) {
            print'<td>'.utf8_encode($dat_loc['nom_loc']).'</td>';
          }
          if ($dat[11]==1) {
             print('<td>Activo</td>');
              }
              else{
                print('<td>Inactivo</td>');
              }

          print'</table>           
           <p>Usuario: <input type="text" name="usu" ';
           $usu= mysqli_query ($mysqli, "SELECT * FROM usuario WHERE email ='$dat[6]'");
           while ($dat_usu=mysqli_fetch_array($usu)){
           print'value="'.utf8_encode($dat_usu['user']).'" disabled';
           }
           print'
           </p>
           <p>Contraseña:
           <input type="password" name="clave" ';
           $pass = mysqli_query ($mysqli, "SELECT * FROM usuario WHERE email = '$dat[6]'");
           while ($dat_pass = mysqli_fetch_array($pass))
           {
              print 'value = "'.$dat_pass['pass'].'"';
           }
           print'
           </p>
           <p>Repetir Contraseña 
           <input type="password" name="Rclave"';
           $pass = mysqli_query ($mysqli, "SELECT * FROM usuario WHERE email = '$dat[6]'");
           while ($dat_pass = mysqli_fetch_array($pass))
           {
              print 'value = "'.$dat_pass['pass'].'"';
           }
           print'
           </p>
           <p>
           Documento:
           <input type="text" name="doc" value="'.$dat[1].'" disabled>
           </p>
           <p>
           Cargo:
           <select name="tip" required>
           <option value="">Elije una opción </option>
           <option value="Domiciliario">Domiciliario </option>
           <option value="Administrador"/>Administrador </option>
           <option value="Otro">Otro </option>
           </select></p>
           <p>
           Nombre
           <input type="text" name="nom" value="'.$dat[3].'" >
           </p>
           <p>
           Apellido
           <input type="text" name="ape" value="'.$dat[4].'" >
           </p>
           <p>
           Telefono
           <input type="text" name="tel" value="'.$dat[5].'">
           </p>
           <p>
           Email
           <input type="text" name="email" value="'.$dat[6].'">
           <input type="hidden" name="email_1" value="'.$dat[6].'">
           </p>
           <p>
           Dirección
           <input type="text" name="dir" value="'.$dat[7].'">
           </p>';

           /////////////////////////////////////////////////
           print
           '<p>ARL
            <select name="arl" required>
            <option value="">Elija su ARL</option>';        
              $arl = mysqli_query($mysqli, "SELECT * FROM arl");
              $id = 1;
              while ($dat = mysqli_fetch_array($arl))
              {
                
                echo '            
                  <option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
                  $id++;    
                  }       
            print '
            </select></p>
            <p>EPS:
              <select name="eps" required>
                <option value="" >Elije EPS</option>';       
                  $eps = mysqli_query($mysqli, "SELECT * FROM eps");
                  $id = 1;
                  while ($dat = mysqli_fetch_array($eps))
                  {
                  
                    echo '            
                      <option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
                      $id++;    
                  }       
            print '</select></p>
            <p>Localidad:
              <select name="loc" required>
                <option value="" >Elije Localidad</option>
                ';   
                  $loc = mysqli_query($mysqli, "SELECT * FROM localidad");
                  $id = 1;
                  while ($dat = mysqli_fetch_array($loc))
                  {
                  
                    echo '            
                      <option value="'.$id.'">'.utf8_encode($dat[1]).'</option>'; 
                      $id++;    
                  }   
            print '
            </select>
            <p>Estado:
            <select name="est" required>            
            <option value="">Cambiar Estado</option>
            <option value="true">Activo</option>
            <option value="false">Inactivo</option>
            </p>
            ';    
            print ' </select></p>
              <input type="submit" value="Actualizar" name="act">
            </form>

          <form action="../tablas/empleado.php">
            <input type="submit" value="Volver">
          </form>';
         
        }
    }
  
  else
  {
    print '<h1>404:Not Found</h1>
    <br>
    <h2>No se encotró ningun dato</h2>
    <form action="../tablas/empleado.php">
    <button>Volver</button>
    </form>';
  }
}
?>