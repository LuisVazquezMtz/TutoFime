<?php 
session_start();

$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    error_reporting(o);
    header('location:cerrar_session.php');
    die();
}

$con = mysqli_connect('localhost','root','','tutofime')
or die('Error en la conexion con el servidor');

$datos_user= "SELECT * FROM datos_user where id_Usuario = '".$_SESSION['id_Usuario']."'";
?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?v2.23">
    <title>TutoFime</title>
</head>
<body>

  
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">


            <div class="btn-menu">
                <label for="slide-menu">
                <img src="img/icon-menu.png" alt="">
                </label>
                </div>
                <div class="logo">
                    <a href="logeado.php">
                        <img src="img/logo.png" alt="Tutofime">
                    </a>
                    <h1> TUTOFIME</h1>
                </div>
                <div class="buscador">
                <form action="busqueda.php" method="GET" class="form_search">
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar Materia...">
                        <input type="submit" value="Buscar" class="btn_buscar">
                </form>  
                </div>
                

            </div>
            
        </div>
    </header>



    <!---------------------------Datos usuario------------------------------------>
    <div class="act_usuario act_usuario2">

        <div class= "datosuser_box datosuser_box2">
        <img src="img/icon-usuario.png" alt="">
        <h3>Informacion Personal</h3>
        <?php $resultado= mysqli_query($con,$datos_user) or die ('Error en el query database');
        while($row=mysqli_fetch_assoc($resultado)){?>


        <br>
            <h4>Nombre(s)</h4>
            <form  action="procesar_actuP.php" method="POST">
            <input type="hidden" value="<?php echo $row["idDatos_user"];?>" name="idDatos">
        <input class="input_user" type="text" value="<?php echo $row["Nombre"];?>" name="nombre">
        <h4>Primer Apellido</h4>
        <input class="input_user" type="text" value="<?php echo $row["ApellidoP"];?>" name="apellidoP">
        <h4>Segundo Apellido</h4>
        <input class="input_user" type="text" value="<?php echo $row["ApellidoM"];?>" name="apellidoM">  <br>
            <h4>Numero de contacto</h4>
            <input class="input_user" type="text" value="<?php echo $row["Numerocont"];?>" name="numero">
            <h4>Correo de contacto</h4>
            <input class="input_user" type="text" value="<?php echo $row["Correocont"];?>" name="correo">
        <div class="table_item">
        <input type="submit" value="Actualizar"  id="EditarP" >
        </div>
         </form>
        <?php } ?>

        </div>
    </div>   
    <!---------------------------Fin de Datos usuario--------------------------> 

    <!----------------------------------MENU SLIDE---------------------->
    <input type="checkbox" name="" id="slide-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <img src="img/icon-usuario.png" alt="" id="icon-user">

            <div class="info-user">
                <h2>  <?php echo $_SESSION['usuario'] ?> </h2>    
                <h3> <?php echo $_SESSION['correo'] ?> </h3>
           </div> 
           <nav>
                <a href="logeado.php">Inicio</a>
                <a href="#">Editar Perfil</a>
                <a href="materias.php">Editar Materias</a>
                <a href="cerrar_session.php">Cerrar Sesión</a>
            </nav>

            <label for="slide-menu">
            <img src="img/icon-menu.png" alt="" id="menu-volver">
            </label>
        </div>
    </div>
    <!---------------------------FIN DE MENU SLIDE------------------->
    

    





    



    
    
</body>
</html>