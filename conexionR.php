
<?php
$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');
session_start();



    if(isset($_POST["user"])){
        if($_POST["user"] == ""){
            echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
        } else{
            if($_POST["password"]==""){
                echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
            } else{
                if($_POST["email"]==""){
                    echo "<script>alert('Por favor, complete todos los campos');window.history.go(-1);</script>";
                }else{
                   
                        
                        $sql = "INSERT INTO `usuario` VALUES
                        (null,'".$_POST["user"]."','".$_POST["password"]."', '".$_POST["email"]."')";
                        $resultado= mysqli_query($con,$sql) or die ('Error en el query database');
                        include("register_datos.html");
                    
                    
                        $sql = "SELECT * FROM usuario where usuario ='".$_POST["user"]."' and contraseña= '".$_POST["password"]."'";
                        $resultado= mysqli_query($con,$sql) or die ('Error en el query database');
                        
                        while($row = $resultado->fetch_array()){
                            $_SESSION['idUsuario']= $row['idUsuario'];
                        }

                
                }
            }
        }
    }



    




?>
