
<?php
$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');

if(isset($_POST['nombre'])){
    if($_POST["nombre"] == ""){
        echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
    } else{
        if($_POST["T_Clase"] == ""){
            echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
        }else{
            if($_POST["horario"] == ""){
                echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
            } else{
                if($_POST["plataforma"] == ""){
                    echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
                }else{



$actualizar = "UPDATE `tutofime`.`materias` SET `NombreM` = '".$_POST["nombre"]."', `Tclase` = '".$_POST["T_Clase"]."',
`Horario` = '".$_POST["horario"]."', `Plataforma` = '".$_POST["plataforma"]."' WHERE (idMaterias = '".$_POST['idMaterias']."');";


$resultado= mysqli_query($con,$actualizar) or die("error en el query");

if($resultado){
    echo "<script>alert('Se ha actualizo la informacion correctamente');
           window.location='/proyectoIHC/materias.php'</script>";
   } else{
       echo "<script>alert('No se pudo actualizar la informacion');window.history.go(-1);</script>";
   }
}
}
}
}
}



?>