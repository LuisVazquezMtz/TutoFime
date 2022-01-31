
<?php



$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');




$actualizar = "UPDATE `tutofime`.`datos_user` SET `Nombre` = '".$_POST["nombre"]."', `ApellidoP` = '".$_POST["apellidoP"]."',
`ApellidoM` = '".$_POST["apellidoM"]."', `Numerocont` = '".$_POST["numero"]."',`Correocont` = '".$_POST["correo"]."' WHERE (idDatos_user = '".$_POST['idDatos']."');";


$resultado= mysqli_query($con,$actualizar) or die("error en el query");

if($resultado){
    echo "<script>alert('Se ha actualizo la informacion correctamente');
           window.location='/proyectoIHC/perfil.php'</script>";
   } else{
       echo "<script>alert('No se pudo actualizar la informacion');window.history.go(-1);</script>";
   }
?>