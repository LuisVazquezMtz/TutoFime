<?php 
session_start();

$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
    error_reporting(o);
    header('location:cerrar_session.php');
    die();
}

?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css?v2.22">
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
                    <h1>TUTOFIME</h1>
                    
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
    
    <!-----------------------------------SLITE--------------------------------------->
        <div class="slider">
        <div class="slides">
            <!-- radio buttons-->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
           
            <!--end radio buttons-->

            <div class="slide first">
                <img src="img/index1.jpg">
            </div>
            <div class="slide">
                <img src="img/index2.jpg">
            </div>
            <div class="slide">
                <img src="img/index3.jpg">
            </div>

            <!--automatic navigation start-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>     
            </div>

            <!--manual navigation start-->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
            </div>


        </div>
    </div>
    
    <script src="js/slide.js"></script>
    

<!-----------------------------FIN DEL SLITE--------------------------------------->

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

<div class="paneles">    

    <div class="info" id="AcercaDe">

        <div class="panel1">
                <br><br><br>
             <h3>¿Que es TutoFime?</h3>
            <p>Somos una página que busca conectar alumnos. Ya sea si tengas una consulta académica 
                o te interesa ayudar a alguien, TutoFime es el lugar correcto para empezar a buscar. <br>
            </p>
        </div>

        <img src="img/logo_b.png" alt="">

    </div>
        
    <div class="info2">

            <img src="img/charla.png" alt="">

        <div class="panel2">
            <br><br>
            <h3> Conecta con tu siguiente asesor </h3>
            <p> Encuentra a uno de los tutores que forman parte de nuestra facultad los cuales comparten
                su conocimiento academico de distintas areas con otros alumnos.  </p>
        </div>



    </div>

    <div class="info3">

           

        <div class="panel3">
            <br><br><br>
            <h3> Comparte tu conocimiento con las personas </h3>
            <p> Crea un perfil de tutor para comenzar a hacer que las personas te conozcan,
                y se contecten contigo para asesoramiento de un area en especifica.  </p>
        </div>

        <img src="img/libroicono.png" alt="">

    </div>

</div>    




    
    <footer>
        <nav class="navegacion">
        <a href="logeado.php">Inicio</a>
        <a href="#AcercaDe">Acerca de Tutofime</a>
        <a href="soporte.html" target="_blank">Soporte</a>

    </nav>
</footer>
    





    



    
    
</body>
</html>