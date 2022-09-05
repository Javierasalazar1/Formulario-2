<?php
     session_start();
     $codrol=$_SESSION['cod_rol'];
     if(session_status()==PHP_SESSION_NONE || !isset($_SESSION['apellido_per']) || !isset($_SESSION['apellido_per']) ){ 
       
       echo '<script>window.location="index.php";</script>';
       
     }
 
     if($codrol==2)
       echo '<script>window.location="homepageconserje.php";</script>';  
 
     if($codrol==3)
       echo '<script>window.location="homepage.php";</script>';  
    include("conexion.php");


    

    $usuario2 = $_SESSION['apellido_per'];


    $sql2="SELECT * FROM usuarios WHERE apellido_per= '$usuario2' ";   // buscamos los datos , se puede logear tanto con
    $consulta = mysqli_query ($con, $sql2);                                                         //  rut como con el nombre usuario
        while ($muestra=mysqli_fetch_array($consulta)) {

            $nombre=$muestra['nombre_per'];
	
        }
    $nombrecomp = $nombre ." ". $usuario2;


?>



<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>

<link rel="stylesheet" href="style.css">




</head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="topnav">
  
  <a class="active" href="homepage.php"style="color:#000000;" >Inicio</a>
  <a href="homepagereservas.php" style="color:#000000;">Reservas</a>
  <a href="formulariousuario.php" style="color:#000000;">Perfil</a>
  <a href="logout.php" class="split">Cerrar Sesion</a>
  <h1 style="color:#000000; font-size: 1.2rem ;background: linear-gradient(120deg, rgba(248,246,251,1) 0%, rgba(177,180,187,1) 100%);" align="center">Bienvenid@ <?php echo $nombrecomp?></h1>
</div>

<div style="padding-left:16px">
  <h2></h2>
  <p></p>
</div>

</body>
</html> 
