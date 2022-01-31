
<?php
$usuario=$_POST['usuario'];
$password=$_POST['password'];
session_start();
$_SESSION['usuario']= $usuario;

$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');


$sql = "SELECT * FROM usuario where usuario ='$usuario' and contraseña= '$password'";
$resultado= mysqli_query($con,$sql) or die ('Error en el query database');
$filas=mysqli_num_rows($resultado);


if($filas){

    $sql = "SELECT * FROM usuario where usuario ='$usuario' and contraseña= '$password'";
    $resultado= mysqli_query($con,$sql) or die ('Error en el query database');
    
    while($row = $resultado->fetch_array()){
        $_SESSION['correo']= $row['correo'];
        $_SESSION['id_Usuario']= $row['idUsuario'];
    }
    
    

    header("location:logeado.php");   
}


else{
    
    include("login.html");
    echo '<script type="text/javascript">';
    echo ' alert("El Correo o la contraseña no coinciden")';
    echo '</script>';
}


mysqli_free_result($resultado);
mysqli_close($con);
?>
