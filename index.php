<?php 
    include("conex.php")
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Formulario de Reserva</title>
</head>
<body>

    <header>
        <nav>
            <a href="" hred="#">Ver mis reservas</a>
           
        </nav>
    </header>


  <form class="form-reserva" action="crud/guardar.php" method="POST">
    <h4>Hacer Reserva</h4>
    <select class="controls" name="espacio" >
                        <option disabled selected="">Seleccione un espacio común</option>
                        <option value="11">piscina</option>
                        <option value="12">quincho</option>
                        <option value="13">gimnasio</option>
                        <option value="14">sala de juegos</option>
                    </select>
    <p> Ingrese fecha de inicio de reserva:</p>               
    <input class="controls" type="date" name="Fecha_inicio">
    <p> Ingrese hora de inicio de reserva:</p> 
    <input class="controls" type="time" name="Hora_inicio">
    <p> Ingrese fecha de termino de reserva:</p> 
    <input class="controls" type="date" name="Fecha_Termino">
    <p> Ingrese hora de termino de reserva:</p> 
    <input class="controls" type="time" name="Hora_Termino">

    <input  type="submit" class="boton" name="save" value="Enviar">

</form>
</body>
</html>