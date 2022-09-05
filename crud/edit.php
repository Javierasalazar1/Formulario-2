<?php 
    include("../conexion.php");
    date_default_timezone_set("America/Santiago"); 
    $date=date("Y-m-d H:00");
    $feden=date("Y-m-d H:00",strtotime($date."+ 1 days"));

    session_start();
    $rut_g=$_SESSION['rut_usuario'];

    if(isset($_GET['id'])){

    $valor_ecriptado = $_GET['id'];

    $consulta2 = mysqli_query( $con,"SELECT Id from reserva where rut_usuario='$rut_g'");

    while($campo =mysqli_fetch_array($consulta2))
      {
        $id_original = $campo['Id'];

        if($valor_ecriptado == md5(md5($id_original)))
            {
                $id_r = $campo['Id'];
            }
       
      }
    }


    if(isset($id_r)){

        $consul= "SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC INNER JOIN usuarios t ON r.rut_usuario=t.rut_usuario AND '$rut_g'=r.rut_usuario AND r.Id='$id_r'";
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

        $id= $_POST['id'];
        $rut_g=$_POST['rut'];
        $espac = $_POST['espacio'];
        $fechaini = $_POST['Fecha_inicio'];
        $fechater = $_POST['Fecha_Termino'];


         /* separar fecha*/    
         $f=explode('T',$fechaini);
         $y=$f[0]."-".$f[1];
         $fi=explode('-',$y);
         $fii=$fi[2]."-".$fi[1]."-".$fi[0]."-".$fi[3];
         $fiii=explode(':',$fii);
         $fiiii=$fiii[0]."-".$fiii[1];
         $fa=explode('-',$fiiii);
            /* separar fecha*/ 
         $s=explode('T',$fechater);
         $t=$s[0]."-".$s[1];
         $ff=explode('-',$t);
         $fff=$ff[2]."-".$ff[1]."-".$ff[0]."-".$ff[3];
         $ffff=explode(':',$fff);
         $fffff=$ffff[0]."-".$ffff[1];
         $fb=explode('-',$fffff);
 

         if($fa[0]>$fb[0]){
            if($fa[1]==$fb[1]){
              ?>
              <script type="text/javascript">
              alert("El día de inicio debe ser menor o igual a el día de término.");
              window.location.href="../vreserva.php"; 
              </script>'; <?php
              exit();
                }
            }else{
                  if($fa[1]>$fb[1]){
                    ?>
                    <script type="text/javascript">
                    alert("El mes de inicio debe ser menor o igual a el dia de término.");
                    window.location.href="../vreserva.php"; 
                    </script>'; <?php
                    exit();
                        }
                else{
                        if($fa[0]==$fb[0]){
                         if($fa[3]>$fb[3]){
                          ?>
                        <script type="text/javascript">
                        alert("La hora de inicio debe ser menor a la hora de término.");
                        window.location.href="../vreserva.php"; 
                        </script>'; <?php
                        exit();
                       
                       }
                }
            }}
          

        $update=mysqli_query($con,"UPDATE reserva set cod_espacioC='$espac', Fecha_inicio='$fechaini', Fecha_fin='$fechater' WHERE Id='$id'");
              
        if($update==1){ ?>

          <script type="text/javascript">
            alert("¡Reserva Editada con Éxito!");
            window.location.href="../vreserva.php"; 
          </script>'; <?php

          }
        }
?>





<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Reserva</title>
  <link rel="stylesheet" href="../estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
</head>




<body>

    <header>
        <nav>
            <a style="float: left;" class="btn btn-light" href="../homepage.php">Inicio</a>

            <a class="btn btn-light" href="../vreserva.php" >Volver a mis reservas</a>
            
        </nav>
    </header>

    <div class="container text-center">
  <div class="row">
    <div class="col-6 col-md-4">

    <form class="form-reserva" action="edit.php" method="POST">
                <h4>Editar Reserva</h4>
                <input id="prut" name="rut" type="hidden" value="<?php echo  $rut_g?>">
                <input id="prut" name="id" type="hidden" value="<?php echo  $id_r?>">
                <select class="controls" name="espacio" require>
                        <option value="<?php echo $espacio?>" ><?php echo $nombre?></option>
                        <option value="11">Piscina</option>
                        <option value="12">Quincho</option>
                        <option value="13">Gimnasio</option>
                        <option value="14">Sala de juegos</option>

                </select>
                    <p> Ingrese fecha y hora de inicio de la reserva:</p>
                    <input class="controls" type="datetime-local" min="<?php echo $feden?>" name="Fecha_inicio" id="Fecha_inicio"  value="<?php echo $fechai?>" required pattern="\d{4}-\d{2}-\d{2}T\d{2}:\d{2}" step="3600">
                    <p> Ingrese fecha y hora de termino de la reserva:</p> 
                    <input class="controls" type="datetime-local" min="<?php echo $feden?>" name="Fecha_Termino" id="Fecha_termino" value="<?php echo $fechaf?>" required pattern="\d{4}-\d{2}-\d{2}T\d{2}:\d{2}" step="3600">

                    <input  type="submit" class="boton" name="Actualizar">

        </form>
    </div>

   <?php $Consul2= ("SELECT * FROM reserva r INNER JOIN espacio_comun e ON r.cod_espacioC=e.cod_espacioC");
        $resulEventos = mysqli_query($con, $Consul2); ?>

    <div class="col-md-8">
        
    <div class="row">        

<div id="calendar">  

<script src ="../js/jquery-3.0.0.min.js"> </script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/moment.min.js"></script>	
<script type="text/javascript" src="../js/fullcalendar.min.js"></script>
<script src='../locales/es.js'></script>

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