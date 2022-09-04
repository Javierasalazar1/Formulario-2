<?php 
    include("conexion.php");
    date_default_timezone_set("America/Santiago");
    $date=date("Y-m-d H:i");
    if(isset($_GET['rut'])){ 
    $rut_u=$_GET['rut'];
    }
    $Consul= ("SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC");
        $resulEventos = mysqli_query($con, $Consul);

    $Consul2= ("SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC");
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
            <a class="btn btn-light" href="homepage.php">Inicio</a>
            <a class="btn btn-light"  href="vreserva.php?rut=<?php echo  $rut_u?>">Mis reservas</a>
            
        </nav>
    </header>

    <div class="container text-center">
  <div class="row">
    <div class="col-6 col-md-4">

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


    <div class="col-md-8">
        
    <div class="row">        

<div id="calendar">  

<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: false,
    eventLimit: false, 
    selectable: false,
    selectHelper: false,


      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){ 

        ?>
          {
        
          _id: '<?php echo $dataEvento['Id']; ?>',
          title: '<?php echo $dataEvento['Nom_espacioC']; ?>',
          start: '<?php echo $dataEvento['Fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['Fecha_fin']; ?>',
          },
        <?php } ?>
    ],
  });
});

</script>
</div>  
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>