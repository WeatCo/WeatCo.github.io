<?php
include ('../php/conexion.php');
include ('../php/editar.php');
ob_end_clean();
if (isset($_POST['act']) && isset($_POST['clave']) && !empty($_POST['clave']) && isset($_POST['Rclave']) && isset($_POST['tip']) && !empty($_POST['tip']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['ape']) && !empty($_POST['ape']) && isset($_POST['tel']) && !empty($_POST['tel']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['dir']) && !empty($_POST['dir']) && isset($_POST['est']) && !empty($_POST['est']) && isset($_POST['txt']) && !empty($_POST['txt']) && isset($_POST['arl']) && !empty($_POST['arl']) && isset($_POST['eps']) && !empty($_POST['eps']) && isset($_POST['loc']) && !empty($_POST['loc']) && isset($_POST['email'])  && isset($_POST['email_1']) && !empty($_POST['email_1']))
{
        $tip = $_POST['tip'];
        $nom = $_POST['nom'];
        $ape = $_POST['ape'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $dir = $_POST['dir'];
        $arl = $_POST['arl'];
        $eps= $_POST['eps'];
        $loc = $_POST['loc'];
        $est = $_POST['est'];
        $txt = $_POST['txt'];
        $clave = $_POST['clave'];
        $Rclave = $_POST['Rclave'];
        $email_1 = $_POST['email_1'];
        if($clave == $Rclave)
        {
        $fila = mysqli_query ($mysqli, "UPDATE empleado SET tp_emp = '$tip', nom_emp = '$nom',ape_emp = '$ape', tel_emp = '$tel', email_emp = '$email', dir_emp = '$dir', id_arl = $arl, id_eps= $eps, id_loc= $loc, estado = $est WHERE doc_emp = '$txt'"); 
        $usu = mysqli_query ($mysqli, "UPDATE usuario SET pass= '$clave', email= '$email' WHERE email='$email_1'");
        print($email_1);
        print '<h2 align = "center">Datos Actualizados</h2>';
        print ($tip).'<br>'.($nom).'<br>'.($ape).'<br>'.($tel).'<br>'.($email).'<br>'.($dir).'<br>'.($est).'<br>'.($clave).'<br>'.($Rclave);
        
        
        }
    else
        {
            print('Digito mal la contraseña');
        }
}
else
    {
         print 'No se pudo actualizar';
    }     
     
?>