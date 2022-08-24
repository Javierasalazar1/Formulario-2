<?php 
    include("../conexion.php");


    $rut_u=$_GET['rut'];
    $espac = $_POST['espacio'];
    $fechaini = $_POST['Fecha_inicio'];
    $fechater = $_POST['Fecha_Termino'];

        if($espac==0 || !$fechaini || !$fechater){
            die("debe llenar los campos");

        }
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
            die("el dia de inicio debe ser menor o igual a el dia de termino");
            }
        }else{
              if($fa[1]>$fb[1]){
                    die("el mes de inicio debe ser menor o igual a el dia de termino");
                    }
            else{
                    if($fa[0]==$fb[0]){
                     if($fa[3]>$fb[3]){
                     die("la hora de inicio debe ser menor a la hora de termino");
                   }
            }
        }}

          
        $rest=mysqli_query($con, "SELECT * FROM reserva  WHERE '$espac'=cod_espacioC");

        while($row=mysqli_fetch_array($rest)){
            if(mysqli_num_rows($rest)!=0){
                $fechai=$row['Fecha_inicio'];
                $fechaf=$row['Fecha_fin'];
                $fecha_inici = strtotime($fechai);
                $fecha_fi = strtotime($fechaf);

                $fechaA = strtotime($fechaini);
                $fechaB = strtotime($fechater);
    
                if($fecha_inici<=$fechaA && $fechaA<=$fecha_fi){
                    if($fecha_inici<=$fechaB && $fechaB<=$fecha_fi){
                        die('NO PUEDE TOMAR ESTE HORARIO. SELECCIONE OTRO.');
                    }else{
                    if($fechaB>$fecha_fi){
                        die('NO PUEDE TOMAR ESTE HORARIO. SELECCIONE OTRA FECHA DE INICIO.');
                    }}
                    }else{ 
                            if($fecha_inici<=$fechaB && $fechaB<=$fecha_fi){
                                if($fecha_inici<=$fechaA && $fechaA<=$fecha_fi){
                                     die('NO PUEDE TOMAR ESTE HORARIO. SELECCIONE OTRO.');
                                }else{
                                        if($fechaA<$fecha_inici){
                                            die('NO PUEDE TOMAR ESTE HORARIO. SELECCIONE OTRA FECHA DE INICIO.');
                                        }}
                                }else{   if($fecha_inici>$fechaA && $fechaB>$fecha_fi){
                                    die('NO PUEDE TOMAR ESTE HORARIO. SELECCIONE OTRO.');
                               }
        
                    }  
    
                }
            
            }}
        
        
    
    
 
    $insertar="INSERT INTO reserva(rut_usuario,cod_espacioC,Fecha_inicio,Fecha_fin)VALUES('$rut_u','$espac','$fechaini','$fechater')";

    


    
    
    
        if (mysqli_query($con,$insertar)) {
                
            echo "<script type="text/javascript"> alert("Reserva hecha con exito.");</script>";

                header("Location:../homepagereservas.php?rut=$rut_u");
            } else {
              echo '<script type="text/javascript"> alert("Error, no se pudo hacer reserva.");</script>';
          }
    
          mysqli_close($con); 
    
          
?>
<script src="https://kit.fontawesome.com/b36d8c9019.js" crossorigin="anonymous"></script>
