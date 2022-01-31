<?php
$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');

$id = $_GET["id"];

$eliminar = "DELETE FROM `tutofime`.`materias` WHERE (idMaterias = '$id');";

$resultado= mysqli_query($con,$eliminar) or die("error en el query");

if($resultado){
    echo "<script>window.location='/proyectoIHC/materias.php'</script>";
   } else{
       echo "<script>alert('No se pudo eliminar la informacion');window.location='/proyectoIHC/materias.php'</script>";
   }
?>