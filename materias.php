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

$materias = "SELECT * FROM materias where id_Usuario = '".$_SESSION['id_Usuario']."'";

?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?v2.3">
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

    <!---------------------------AGREGAR MATERIAS-------------------- -->
    <div class="container-add">
        <h2 class="container-title">Registrar Materia</h2>
        <form action="insertarM.php" method="POST" class="container-form">

                <laber class="container__label">Nombre: </laber>
                <input name="nombre" type="text" class="container_input" placeholder="Nombre de la materia">
       
               <laber class="container__label">Tipo de Clase: </laber>
          

                <input name="T_Clase" type="text" list="value" class="container_input"  placeholder="Tipo de clase">
                <datalist id="value">
                <option>Grupal</option>
                <option>Particular</option>
                <option>Grupal o Particular</option>
                </datalist>

                <laber class="container__label">Horario: </laber>
                <input name="horario" type="text" class="container_input" placeholder="Dias y Horas de la clase">

                <laber class="container__label">Plataforma: </laber>
            
              <input name="plataforma" type="text" list="value2" class="container_input" placeholder="Plataforma" >
                <datalist id="value2">
                <option>Teams</option>
                <option>Zoom</option>
                <option>Discord</option>
                <option>Skype</option>
                <option>Otro</option>
                </datalist>

                <input type="submit" name="registrarM" value="Registrar Materia" id="registrar_materia">
        </form>
             
    </div>





    <!---------------------------TABLA MATERIAS------------------------------------>
    <div class="apartado_materias">

    <div class="materias-table">
        <div class="table_title">Materias Activas</div>

        <div class="table_header">Nombre</div>
        <div class="table_header">Tipo</div>
        <div class="table_header">Horario</div>
        <div class="table_header">Plataforma</div>
        <div class="table_header">Modificar</div>

    <?php $resultado= mysqli_query($con,$materias) or die ('Error en el query database');
        while($row=mysqli_fetch_assoc($resultado)){?>

        <div class="table_item"> <?php echo $row["NombreM"]?>  </div>
        <div class="table_item"> <?php echo $row["Tclase"]?> </div>
        <div class="table_item"> <?php echo $row["Horario"]?></div>
        <div class="table_item"> <?php echo $row["Plataforma"]?></div>
        <div class="table_item">
            <a href="actu_materias.php?id=<?php echo $row["idMaterias"]?>" class="table_item_link" id="EditarM">Editar</a> |
            <a href="procesar_eliminarM.php?id=<?php echo $row["idMaterias"]?>" class="table_item_link2" id="EliminarM">Eliminar</a>
        </div>
        <?php } ?>
    </div>
    </div>   
    <!---------------------------Fin de TABLA MATERIAS-------------------------> 
            <script src="js/Conf_Eliminar.js"></script>
</body>
</html>