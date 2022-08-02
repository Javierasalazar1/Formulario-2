<?php 
    include("../conex.php");

    $espac = $_POST['espacio'];
    $fechaini = $_POST['Fecha_inicio'];
    $fechater = $_POST['Fecha_Termino'];

    $f=explode('T',$fechaini);
    $fechainicial=$f[0]."a las".$f[1];

    $s=explode('T',$fechater);
    $fechafinal=$s[0]."a las".$s[1];

 
    $insertar="INSERT INTO reserva(cod_espacioC,Fecha_inicio,Fecha_fin)VALUES('$espac','$fechainicial','$fechafinal')";

    
    
    
        if (mysqli_query($con,$insertar)) {

            $_SESSION['mensaje']= 'Reserva guardada';
                header('Location:../index.php');
            } else {
              echo "Error: " . $insertar . "<br>" . mysqli_error($con);
          }
    
          mysqli_close($con); 
    
    
?>