<?php 
    include("conex.php");

    $id=$_GET['id'];

$consulta = mysqli_query ($con, "SELECT * FROM reserva where id='id'");
$modificar=mysqli_fetch_array($consulta)
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
  <title>Editar Reserva</title>
</head>
<body>

    <header>
        <nav>
            <a href="vreserva.php" hred="#">Volver a mis reservas</a>
           
        </nav>
    </header>


  <form class="form-reserva" action="crud/edit.php" method="POST">
    <h4>Editar Reserva</h4>
    <select class="controls" name="espacio" id="espacio" value="<?php echo $modificar['cod_espacioC']?>">
                        <option disabled selected="">Seleccione un espacio común</option>
                        <option value="11">piscina</option>
                        <option value="12">quincho</option>
                        <option value="13">gimnasio</option>
                        <option value="14">sala de juegos</option>
                    </select>
    <p> Ingrese fecha y hora de inicio de la reserva:</p>               
    <input class="controls" type="datetime-local" name="Fecha_inicio" id="Fecha_inicio"  value="<?php echo $modificar['Fecha_inicio']?>">
    <p> Ingrese fecha y hora de termino de la reserva:</p> 
    <input class="controls" type="datetime-local" name="Fecha_Termino" id="Fecha_termino" value="<?php echo $modificar['Fecha_fin']?>">


    <input  type="submit" class="boton" name="save" value="Enviar">

</form>
</body>
</html>