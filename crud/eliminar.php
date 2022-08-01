
<?php
include("../conex.php");

$id_r=$_GET['id'];

$consulta = mysqli_query ($con, "DELETE FROM reserva where id='$id_r'");

if($consulta==1){
	header('location:../vreserva.php');
}
?>

