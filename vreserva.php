<?php 
    include("conex.php");

  
    $consul= "SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC";
    $resultado = mysqli_query($con,$consul);


  
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="vsestilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
  <title>Mis reservas</title>
</head>
<body>
<header>
        <nav>
            <a href="index.php" hred="#">Hacer formulario</a>
           
        </nav>
    </header>

    <br>

    <table class= "table table-dark table-striped" >
        <thead class="table-dark">
        <tr>
            <td>Espacio común</td>
            <td>Fecha de inicio</td>
            <td>Fecha de Termino</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
        </thead>
        <?php 
        while($row=mysqli_fetch_array($resultado)){
            if(mysqli_num_rows($resultado)!=0){
                $fechai=$row['Fecha_inicio'];
                $fechaf=$row['Fecha_fin']; 
                /* cambiar vista de fecha*/ 
                $f=explode('T',$fechai);
                $fechainicial=$f[0]."-".$f[1];
                $fi=explode('-',$fechainicial);
                $fechainif=$fi[2]."-".$fi[1]."-".$fi[0]." a las ".$fi[3];
                    /* cambiar vista de fecha*/ 
                $s=explode('T',$fechaf);
                $fechafinal=$s[0]."-".$s[1];
                $ff=explode('-',$fechafinal);
                $fechafinf=$ff[2]."-".$ff[1]."-".$ff[0]." a las ".$ff[3];
                
            
            }
		 ?>

		<tr>
			<td><?php echo $row['Nom_espacioC'] ?></td>
			<td><?php echo $fechainif ?></td>
			<td><?php echo $fechafinf ?></td>
            <td><a href="crud/edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info"><i class="fas fa-marker"></i></a></td>
            <td><a href="crud/eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a></td>

		</tr>
	<?php 
	}
	 ?>

    </table>
</body>
</html>
