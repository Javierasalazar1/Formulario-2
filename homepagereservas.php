<?php 
    include("conexion.php");
    date_default_timezone_set("America/Santiago");
    $date=date("Y-m-d H:i");
    if(isset($_GET['rut'])){ 
    $rut_u=$_GET['rut'];
    }
    $Consul= ("SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC");
        $resulEventos = mysqli_query($con, $Consul);
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulario de Reserva</title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <nav>
            <a href="homepage.php"  class="btn btn-info">Inicio</a>
            <a href="vreserva.php?rut=<?php echo  $rut_u?>"  class="btn btn-info">Mis reservas</a>
            
        </nav>
    </header>

<div class="container text-center">
  <div class="row row-cols-2">
    <div class="col">  
        <form class="form-reserva" action="crud/guardar.php?rut=<?php echo  $rut_u?>" method="POST">
            <h4>Hacer Reserva</h4>
                <select class="controls" name="espacio">
                        <option disabled selected="">Seleccione un espacio común</option>
                        <option value="11">Piscina</option>
                        <option value="12">Quincho</option>
                        <option value="13">Gimnasio</option>
                        <option value="14">Sala de juegos</option>

                </select>
                    <p> Ingrese fecha y hora de inicio de la reserva:</p>
                <input class="controls" type="datetime-local" min="<?php echo $date?>" name="Fecha_inicio" >
                    <p> Ingrese fecha y hora de termino de la reserva:</p> 
                <input class="controls" type="datetime-local" min="<?php echo $date?>" name="Fecha_Termino">

                <input  type="submit" class="boton" name="save" value="Enviar">

        </form>
    </div>

    <div class="col">

        <div class="row">
            <div class="col-md-12 mb-4">
            <h2 class="text-center" id="title">Reservas hechas</h2>
            <h5 class="text-center">Vea disponibilida aquí: </h5>
        </div></div>

   
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>