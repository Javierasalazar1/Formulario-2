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

?>



<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>

<link rel="stylesheet" href="style.css">




</head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="topnav">
  
  <a class="active" href="homepage.php"style="color:#000000;">Inicio</a>
  <a href="homepagereservas.php"style="color:#000000;">Reservas</a>
  <a href="#contact"style="color:#000000;">Perfil</a>
  <a href="logout.php" class="split">Cerrar Sesion</a>
</div>




<div class="perfilcontainer"> <ul>
<li>Nombre:<?php echo $nombreper?></li>
<li>Apellido:<?php echo $usuario2?></li>
<li>Rut:<?php echo $rutper?></li>
<li>Telefono:<?php echo "+56".$telefonoper?></li>
<li>Domicilio:<?php echo $domicilioper?></li>
</ul></div>



</body>
</html> 
