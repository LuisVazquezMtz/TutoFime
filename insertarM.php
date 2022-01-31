<?php
session_start();
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


                    $sql = "INSERT INTO `materias` VALUES(null,'".$_SESSION['id_Usuario']."','".$_POST["nombre"]."','".$_POST["T_Clase"]."',
                '".$_POST["horario"]."','".$_POST["plataforma"]."')";

                 $resultado= mysqli_query($con,$sql);

                  if($resultado){
                         echo "<script>alert('Se ah registrado la materia con éxito');
                                 window.location='/proyectoIHC/materias.php'</script>";
                 } else{
                         echo "<script>alert('No se pudo registrar la materia');window.history.go(-1);</script>";
            }

                }
            }
        }
    }
}





?>