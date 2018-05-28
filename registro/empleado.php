 <?php
 include("../php/conexion.php");
 if (isset($_POST['enviar']) && isset($_POST['doc']) && !empty($_POST['doc']) && isset($_POST['tip']) && !empty($_POST['tip']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['ape']) && !empty($_POST['ape']) && isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['dir']) && !empty($_POST['dir']) && isset($_POST['arl']) && !empty($_POST['arl']) && isset($_POST['eps']) && !empty($_POST['eps']) && isset($_POST['loc']) && !empty($_POST['loc']) && isset($_POST['usu']) && !empty($_POST['usu']) && isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['Rclave']) && !empty($_POST['Rclave']))
	 {
        $doc=$_POST['doc'];
        $tip=$_POST['tip'];
        $nom=$_POST['nom'];
        $ape=$_POST['ape'];
        $tel=$_POST['tel'];
        $email=$_POST['email'];
        $dir=$_POST['dir'];
        $arl=$_POST['arl'];
        $eps=$_POST['eps'];
        $loc=$_POST['loc'];
        $usu=$_POST['usu'];
        $clave=$_POST['clave'];
        $Rclave=$_POST['Rclave'];
        if($clave == $Rclave)
        {
        	$empleado= $mysqli-> query ("INSERT INTO empleado (doc_emp,tp_emp,nom_emp,ape_emp,tel_emp,email_emp,dir_emp,id_arl,id_eps,id_loc,estado) VALUES ('$doc','$tip','$nom','$ape','$tel','$email','$dir','$arl','$eps','$loc',1)");
        	$usuario = $mysqli -> query ("INSERT INTO usuario (user,pass,email,tipo) VALUES ('$usu','$clave','$email','Empleado')");
        	header ('location:registrado.html');

        }
        else
    	{
    		print('<script type="text/javascript">
    			    alert("contraseña incorrecta :c");
    			    </script>
            <form action="../empleado.php">
                <input type="submit" value="Volver">
            </form>');
    	}
 
 	 } 
 ?>