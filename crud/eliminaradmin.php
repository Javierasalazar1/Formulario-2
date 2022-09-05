<?php
include("../conexion.php");
session_start();


if(isset($_GET['id'])){

	$valor_ecriptado = $_GET['id'];
	
	$consulta2 = mysqli_query( $con,"SELECT Id from reserva");
	
	while($campo =mysqli_fetch_array($consulta2))
		{
			$id_original = $campo['Id'];
	
			if($valor_ecriptado == md5(md5($id_original)))
				{
					$id_r = $campo['Id'];
				}
		   
		}
	}


$consulta = mysqli_query ($con, "DELETE FROM reserva where Id='$id_r'");

if($consulta==1){ ?>

	<script type="text/javascript">
		alert("¡Reserva eliminada con éxito!");
		window.location.href="../vreserva_admin.php"; 
	</script>'; <?php
	
	}else{
		?>

	<script type="text/javascript">
		alert("¡Reserva no se pudo eliminar!");
		window.location.href="../vreserva_admin.php"; 
	</script>'; <?php
	}
	?>


