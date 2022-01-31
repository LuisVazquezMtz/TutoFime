<?php 
session_start();

$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    error_reporting(o);
    header('location:cerrar_session.php');
    die();
}

$busqueda = $_REQUEST['busqueda'];

?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?v2.25">
    <title>TutoFime</title>
</head>
<body class="busqueda_body">

  
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
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar Materia..." value="<?php echo $busqueda; ?>">
                        <input type="submit" value="Buscar" class="btn_buscar">
                </form>  
                </div>
                



            </div>
            
        </div>
    </header>
    
    <!---------------------------Datos Buscados------------------------------------>

       <?php
       $con = mysqli_connect('localhost','root','','tutofime')
        or die('Error en la conexion con el servidor');
        $materias = "SELECT * FROM tutofime.materias inner join datos_user on materias.id_Usuario = datos_user.id_Usuario where NombreM = '$busqueda'";
        $resultado= mysqli_query($con,$materias) or die ('Error en el query database');

        if($resultado){
            while($row = $resultado->fetch_array()){
                $id_usuario = $row['id_Usuario'];
                $nombreM = $row['NombreM'];
                $Tclase = $row['Tclase'];
                $horario = $row['Horario'];

                $plataforma = $row['Plataforma'];
                $nombreU = $row['Nombre'];
                $apellidoP = $row['ApellidoP'];
                $apellidoM = $row['ApellidoM'];
                $numero = $row['Numerocont'];
                $correo = $row['Correocont'];


       
       ?>
            
        <div class="resultados_busquedas">
        <h2><?php echo $nombreM;?></h2> 
                <div class="datos_box">
                    <img src="img/icon-usuario.png" alt="">
                    <div class="datos_busqueda">
                        <h4>Datos del Instructor</h4>
                        <b>Instructor:    </b> <?php echo $nombreU?> <?php echo $apellidoP?> <?php echo $apellidoM?><br>
                        <b>Numero de contacto: </b><?php echo $numero?> <br>
                        <b>Correo de contacto: </b><?php echo $correo?>  <br>
                        
                        <h4>Informacion de la clase</h4>
                        <b>Tipo de clase: </b> <?php echo $Tclase?> <br>
                        <b>Horario:       </b> <?php echo $horario?>  <br>
                        <b>Plataforma:    </b> <?php echo $plataforma?> <br>
            </div>
                </div>

        </div>

        <?php 
         }
        }
        ?>

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
                <a href="perfil.php">Editar Perfil</a>
                <a href="materias.php">Editar Materias</a>
                <a href="cerrar_session.php">Cerrar Sesión</a>
            </nav>

            <label for="slide-menu">
            <img src="img/icon-menu.png" alt="" id="menu-volver">
            </label>
        </div>
    </div>
    <!---------------------------FIN DE MENU SLIDE------------------->


    <!---------------------------Fin de Datos Buscados-------------------------> 
    <footer>
    <nav class="navegacion">
        <a href="logeado.php">Inicio</a>
        <a href="logeado.php #AcercaDe">Acerca de Tutofime</a>
        <a href="soporte.html" target="_blank">Soporte</a>

    </nav>
</footer>
    





    



    
    
</body>
</html>