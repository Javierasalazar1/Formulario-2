<?php
include("../conexion.php");

$id_r=$_GET['id'];


$consulta = mysqli_query ($con, "DELETE FROM reserva where Id='$id_r'");

if($consulta==1){
	header('location:../vreserva_admin.php');
}
?>
