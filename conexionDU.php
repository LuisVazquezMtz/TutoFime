
<?php
$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');
session_start();

$idUser= $_SESSION['idUsuario'];



 $sql = "INSERT INTO `datos_user` VALUES
 (null,'".$idUser."','".$_POST["Nombre"]."','".$_POST["primer_apellido"]."',
 '".$_POST["segundo_apellido"]."','".$_POST["numero"]."','".$_POST["correo"]."')";

$resultado= mysqli_query($con,$sql) or die ('Error en el query database');


echo '<script type="text/javascript">';
    echo ' alert("Se ah registrado correctamente")';
    echo '</script>';


include("login.html");
mysqli_close($con);
?>