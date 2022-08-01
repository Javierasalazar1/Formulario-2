<?php 
    include("../conex.php");

    $espac = $_POST['espacio'];
    $fechaini = $_POST['Fecha_inicio'];
    $fechater = $_POST['Fecha_Termino'];
    
 
    $insertar="INSERT INTO reserva(cod_espacioC,Fecha_inicio,Fecha_fin)VALUES('$espac','$fechaini','$fechater')";

    
    
    
        if (mysqli_query($con,$insertar)) {
                header('Location:../index.php');
            } else {
              echo "Error: " . $insertar . "<br>" . mysqli_error($con);
          }
    
          mysqli_close($con); 
    
    
?>