<?php 
    include("../conex.php");
  
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query= "SELECT * FROM reserva WHERE id=$id";
        $result= mysqli_query($con,$query);
        $consul= "SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC";
        $res=mysqli_query($con,$consul);

        if(mysqli_num_rows($result)==1){
            $row= mysqli_fetch_array($result);
            $espacio=$row['cod_espacioC'];
            $fechai=$row['Fecha_inicio'];
            $fechaf=$row['Fecha_fin'];
            if($id=$_GET['id']){
                $row=mysqli_fetch_array($res);
                $nombre=$row['Nom_espacioC'];
            }
        }
    }
    if(isset($_POST['Actualizar'])){
        $id= $_GET['id'];
        $espac = $_POST['espacio'];
        $fechaini = $_POST['Fecha_inicio'];
        $fechater = $_POST['Fecha_Termino'];

        $update=mysqli_query($con,"UPDATE reserva set cod_espacioC='$espac', Fecha_inicio='$fechaini', Fecha_fin='$fechater'WHERE id=$id");

        if($update==1){
	        header('location:../vreserva.php');
}

    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
  <title>Editar Reserva</title>
</head>
<body>

    <header>
        <nav>
            <a href="../vreserva.php" hred="#">Volver a mis reservas</a>
           
        </nav>
    </header>


  <form class="form-reserva" action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
    <h4>Editar Reserva</h4>
    <select class="controls" name="espacio">
                        <option disabled selected=""  ><?php echo $nombre?></option>
                        <option value="11">piscina</option>
                        <option value="12">quincho</option>
                        <option value="13">gimnasio</option>
                        <option value="14">sala de juegos</option>
                    </select>
    <p> Ingrese fecha y hora de inicio de la reserva:</p>               
    <input class="controls" type="datetime-local" name="Fecha_inicio" id="Fecha_inicio"  value="<?php echo $fechai?>">
    <p> Ingrese fecha y hora de termino de la reserva:</p> 
    <input class="controls" type="datetime-local" name="Fecha_Termino" id="Fecha_termino" value="<?php echo $fechaf?>">


    <input  type="submit" class="boton" name="Actualizar" >

</form>
</body>
</html>