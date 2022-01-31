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
$id = $_GET["id"];

$materias = "SELECT * FROM materias where idMaterias = '$id'";

?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?v2.26">
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
                <a href="#">Editar Materias</a>
                <a href="cerrar_session.php">Cerrar Sesión</a>
                
            </nav>

            <label for="slide-menu">
            <img src="img/icon-menu.png" alt="" id="menu-volver">
            </label>
        </div>
    </div>
    <!---------------------------FIN DE MENU SLIDE------------------->

    <!---------------------------TABLA EDITAR MATERIAS------------------------------------>
    <div class="apartado_materias">

    <form class="materias-table" action="procesar_actuM.php" method="POST">
        <div class="table_title">Modificar Materia</div>

        <div class="table_header">Nombre</div>
        <div class="table_header">Tipo</div>
        <div class="table_header">Horario</div>
        <div class="table_header">Plataforma</div>
        <div class="table_header">Modificar</div>

    <?php $resultado= mysqli_query($con,$materias) or die ('Error en el query database');


        while($row=mysqli_fetch_assoc($resultado)){?>
        <input type="hidden" class="table_item" value="<?php echo $row["idMaterias"];?>" name="idMaterias">
        <input type="text" class="table_item" value="<?php echo $row["NombreM"];?>" name="nombre">



       
        <input name="T_Clase" type="text" list="value" class="table_item"   value="<?php echo $row["Tclase"];?>">
                <datalist id="value">
                <option>Grupal</option>
                <option>Particular</option>
                <option>Grupal o Particular</option>
                </datalist>


        <input type="text" class="table_item" value="<?php echo $row["Horario"];?>" name="horario">


        <input name="plataforma" type="text" list="value2" class="table_item" value="<?php echo $row["Plataforma"];?>" >
                <datalist id="value2">
                <option>Teams</option>
                <option>Zoom</option>
                <option>Discord</option>
                <option>Skype</option>
                <option>Otro</option>
                </datalist>

        <?php } mysqli_free_result($resultado);?>

        <input type="submit" value="Actualizar" class="actualizar-buttonM" >

    </form>
    </div> 