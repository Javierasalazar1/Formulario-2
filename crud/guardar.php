<?php 
    include("../conex.php");

    $espac = $_POST['espacio'];
    $fechaini = $_POST['Fecha_inicio'];
    $fechater = $_POST['Fecha_Termino'];

    $f=explode('-','T',$fechaini);
    $fechainic= $f[2].'/'.$f[1].'/'.$f[0].' '.$f[3];
 
    $insertar="INSERT INTO reserva(cod_espacioC,Fecha_inicio,Fecha_fin)VALUES('$espac','$fechainiC','$fechater')";

    
    
    
        if (mysqli_query($con,$insertar)) {
                header('Location:../index.php');
            } else {
              echo "Error: " . $insertar . "<br>" . mysqli_error($con);
          }
    
          mysqli_close($con); 
    
    
?>