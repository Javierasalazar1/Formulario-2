<?php 
    include("../conex.php");
    date_default_timezone_set("America/Santiago");
    $date=date("Y-m-d H:i");  

    if(isset($_GET['id'])){
        $id=$_GET['id'];

        $consul= "SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC AND id=$id";
        $res=mysqli_query($con,$consul);

        if(mysqli_num_rows($res)==1){
            $row= mysqli_fetch_array($res);
            $espacio=$row['cod_espacioC'];
            $fechai=$row['Fecha_inicio'];
            $fechaf=$row['Fecha_fin'];
            $nombre=$row['Nom_espacioC'];
            
        }
    }
    if(isset($_POST['Actualizar'])){
        $id= $_GET['id'];
        $espac = $_POST['espacio'];
        $fechaini = $_POST['Fecha_inicio'];
        $fechater = $_POST['Fecha_Termino'];

                /* separar fecha*/    
    $f=explode('T',$fechaini);
    $y=$f[0]."-".$f[1];
    $fi=explode('-',$y);
    $fii=$fi[2]."-".$fi[1]."-".$fi[0]."-".$fi[3];
    $fa=explode(':',$fii);
       /* separar fecha*/ 
    $s=explode('T',$fechater);
    $t=$s[0]."-".$s[1];
    $ff=explode('-',$t);
    $fff=$ff[2]."-".$ff[1]."-".$ff[0]."-".$ff[3];
    $fb=explode(':',$fff);

    if($fa[0]>$fb[0]){
        die("la fecha de inicio debe ser menor a la de término");
    }else{
        if($fa[1]>$fb[1]){
          die("el mes de inicio debe ser menor o igual a el mes de termino");
        }else{
            if($fa[2]>$fb[2]){
                die("el dia de inicio debe ser menor o igual a el dia de termino");
            }else{
                if($fa[3]>$fb[3]){
                    die("la hora de inicio debe ser menor a la hora de termino");
               }
            }
        }
    }


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
                        <option value="<?php echo $espacio?>" ><?php echo $nombre?></option>
                        <option value="11">Piscina</option>
                        <option value="12">Quincho</option>
                        <option value="13">Gimnasio</option>
                        <option value="14">Sala de juegos</option>
                    </select>
    <p> Ingrese fecha y hora de inicio de la reserva:</p>               
    <input class="controls" type="datetime-local" min="<?php echo $date?>" name="Fecha_inicio" id="Fecha_inicio"  value="<?php echo $fechai?>">
    <p> Ingrese fecha y hora de termino de la reserva:</p> 
    <input class="controls" type="datetime-local" min="<?php echo $date?>" name="Fecha_Termino" id="Fecha_termino" value="<?php echo $fechaf?>">


    <input  type="submit" class="boton" name="Actualizar" >

</form>
</body>
</html>