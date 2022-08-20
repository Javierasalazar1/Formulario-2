<?php


$usuario = $_POST['usuario'];
$password = $_POST['pswd'];

include("conexion.php");
 
$sql="SELECT * FROM usuarios WHERE apellido_per = '$usuario' LIMIT 1";   // buscamos los datos , se puede logear tanto con
$consulta = mysqli_query ($con, $sql);                                                         //  rut como con el nombre usuario(solo residentes)
while ($muestra=mysqli_fetch_array($consulta)) {
	$clave=$muestra['rut_usuario'];
	$n_u=$muestra['apellido_per'];
    $nombre=$muestra['nombre_per'];
    $codrol=$muestra['cod_rol'];

	
}


if(password_verify($password, $clave)){
     session_start();
     $_SESSION['apellido_per']=$n_u;
     // guardar el usuario en la sesion
     $_SESSION['rut_usuario']=$clave;
     $_SESSION['nombre_per']=$nombre;

	  
	
}elseif($password==$clave){
	session_start();

	  $_SESSION['apellido_per']=$n_u;
     // guardar el usuario en la sesion
     $_SESSION['rut_usuario']=$clave;
     $_SESSION['nombre_per']=$nombre;
     $_SESSION['cod_rol']=$codrol;
     $_SESSION['telefono_per']=$telefonoper;
     $_SESSION['num_domicilio']=$domicilioper;

	  if($codrol == 3)echo '<script>window.location="homepage.php";</script>';
    if($codrol == 2)echo '<script>window.location="homepageconserje.php";</script>';
    if($codrol == 1)echo '<script>window.location="homepageadmin.php";</script>';
      

	}else{
		header('location: index.php?error1=pass');

		;}




?>
