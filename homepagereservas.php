<?php 
    include("conexion.php");
    session_start();
    $rut_u=$_SESSION['rut_usuario'];

    date_default_timezone_set("America/Santiago");
    $date=date("Y-m-d H:00");
    $feden=date("Y-m-d H:00",strtotime($date."+ 1 days"));
  
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

<script type= "text/javascript">
    function confirmRev()
    {
        var respuesta = confirm("¿Está seguro que desea hacer reserva?");
        if(respuesta==true)
        {
            return true;
        }else{
            return false;
        }
    }
    </script>



<body>

    <header>
        <nav>
            <a style="float: left;" class="btn btn-light" href="homepage.php">Inicio</a>
            <a class="btn btn-light"  href="vreserva.php">Mis reservas</a>
            
        </nav>
    </header>

    <div class="container text-center">
  <div class="row">
    <div class="col-6 col-md-4">

        <form class="form-reserva" action="crud/guardar.php" method="POST">
            <h4>Hacer Reserva</h4>
                <input id="prut" name="rut" type="hidden" value="<?php echo  $rut_u?>">
                <select class="controls" name="espacio" required>
                        <option disabled selected="">Seleccione un espacio común</option>
                        <option value="11">Piscina</option>
                        <option value="12">Quincho</option>
                        <option value="13">Gimnasio</option>
                        <option value="14">Sala de juegos</option>

                </select>
                    <p> Ingrese fecha y hora de inicio de la reserva:</p>
                <input class="controls" type="datetime-local" min="<?php echo $feden?>" step="1800" name="Fecha_inicio" required pattern="\d{4}-\d{2}-\d{2}T\d{2}:00">
                    <p> Ingrese fecha y hora de término de la reserva:</p> 
                <input class="controls" type="datetime-local" min="<?php echo $feden?>" name="Fecha_Termino" step="1800" required pattern="\d{4}-\d{2}-\d{2}T\d{2}:00">

                <input  type="submit" class="boton" name="save" value="Enviar" " onclick="return confirmRev()">

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
        
          _id: '<?php echo $dataEvento['Id'];?>',
          title: '<?php echo $dataEvento['Nom_espacioC']; ?>',
          start: '<?php echo $dataEvento['Fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['Fecha_fin'] ; ?>',
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