<?php
    session_start();
    $codrol=$_SESSION['cod_rol'];
    if(session_status()==PHP_SESSION_NONE || !isset($_SESSION['apellido_per']) || !isset($_SESSION['apellido_per']) ){ 
      
      echo '<script>window.location="index.php";</script>';
      
    }

    if($codrol==2)
      echo '<script>window.location="homepageconserje.php";</script>';  

    if($codrol==1)
      echo '<script>window.location="homepageadmin.php";</script>';  
    include("conexion.php");


    

    $usuario2 = $_SESSION['apellido_per'];


    $sql2="SELECT * FROM usuarios WHERE apellido_per= '$usuario2' ";   // buscamos los datos , se puede logear tanto con
    $consulta = mysqli_query ($con, $sql2);                                                         //  rut como con el nombre usuario
        while ($muestra=mysqli_fetch_array($consulta)) {

            $nombre=$muestra['nombre_per'];
            $rut_p=$muestra['rut_usuario'];
	
        }
    $nombrecomp = $nombre ." ". $usuario2 ;


?>



<!DOCTYPE html>
<html>
<head>
  <title>Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">




</head>
<meta name="viewport" content="width=device-width, initial-scale=1">



<div class="topnav">
  
  <a class="active" href="#home">Inicio</a>
  <a href="homepagereservas.php?rut=<?php echo  $rut_p?>">Reservas</a>
  <a href="perfilusuariopage.php">Perfil</a>
  <a href="logout.php" class="split">Cerrar Sesion</a>
  <h1 style="color:#ffffff; font-size: 1.7rem ;background-color:#110a2f" align="center">Bienvenid@ <?php echo $nombrecomp?></h1>
</div>



<div style="padding-left:16px">
  <h2></h2>
  <p></p>
</div>
<body>
<div class="container">
  <b style="color:#cdc6ee; bold=negrita; font-size: 2rem ">Espacios Comunes</b>  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" align="center">
      <div class="item active"> 
        <img src="img/g4.jpg" class="img-rounded" alt="Sala" width="4000">
      </div>

      <div class="item">
        <img src="img/g1.jpg"  class="img-rounded" alt="Gym" width="4000">
      </div>
    
      <div class="item">
        <img src="img/g3.jpg"  class="img-rounded" alt="Quincho" width="4000">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html> 
