<?php
    session_start();
    if(session_status()==PHP_SESSION_NONE || !isset($_SESSION['apellido_per']) || !isset($_SESSION['apellido_per'])){ 
      
      echo '<script>window.location="index.php";</script>';
      
    }
    
    include("conexion.php");


    

    $nombreper = $_SESSION['nombre_per'];
    $usuario2 = $_SESSION['apellido_per'];
    $rutper = $_SESSION['rut_usuario'];
    $telefonoper= $_SESSION['telefono_per'];
    $domicilioper = $_SESSION['num_domicilio'];



    $sql2="SELECT * FROM usuarios WHERE apellido_per= '$usuario2' ";   // buscamos los datos , se puede logear tanto con
    $consulta = mysqli_query ($con, $sql2);                                                         //  rut como con el nombre usuario
        while ($muestra=mysqli_fetch_array($consulta)) {

            $nombre=$muestra['nombre_per'];
	
        }
    $nombrecomp = $nombre ." ". $usuario2 ;


?>



<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>

<link rel="stylesheet" href="style.css">




</head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="topnav">
  
  <a class="active" href="homepage.php">Inicio</a>
  <a href="#news">Reservas</a>
  <a href="#contact">Perfil</a>
  <a href="logout.php" class="split">Cerrar Sesion</a>
</div>

<div style="padding-left:16px">

</div>

<div class="perfilcontainer"> <ul>
<li>Nombre: <?php echo $nombreper?></li>
<li>Apellido: <?php echo $usuario2?></li>
<li>Rut: <?php echo $rutper?></li>
<li>Telefono: <?php echo $telefonoper?></li>
<li>N_Domicilio: <?php echo $domicilioper?></li>
</ul></div>



</body>
</html> 
