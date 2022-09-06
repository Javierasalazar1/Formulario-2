<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<?php 
    include("../conexion.php");
    session_start();
   


    $rut_u=$_POST['rut'];
    $espac = $_POST['espacio'];
    $fechaini = $_POST['Fecha_inicio'];
    $fechater = $_POST['Fecha_Termino'];

        if($espac==0 || !$fechaini || !$fechater){
            ?>
            <script type="text/javascript">
            alert("Debe llenar todos los campos");
            window.location.href="../homepagereservas.php"; 
            </script>'; <?php
                exit(); 

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

        $v=6;


    if($fa[0]>$fb[0]){
        if($fa[1]==$fb[1]){

        
            ?>
            <script type="text/javascript">
                alert("El día de inicio debe ser menor o igual al día de término");
                window.location.href="../homepagereservas.php";  
            </script>'; <?php
            
            
            exit();
            }
        }else{
              if($fa[1]>$fb[1]){

                ?>
            <script type="text/javascript">
            alert("el mes de inicio debe ser menor o igual a el mes de término");
            window.location.href="../homepagereservas.php";
            
            </script>'; <?php
                exit(); 
                
                    }
            else{
                    if($fa[0]==$fb[0]){
                     if($fa[3]>$fb[3] || $fa[3]+6>$fb[3]){
                        
                        ?>
                        <script type="text/javascript">
                        alert("la hora de inicio debe ser menor a la hora de término y con al menos 6 horas de diferencia.");
                        window.location.href="../homepagereservas.php"; 
                        exit();
                        </script>'; <?php
                        exit(); 

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
   
                        ?>
                        <script type="text/javascript">
                        alert("No puede tomar este horario, seleccione otra fecha.");
                        window.location.href="../homepagereservas.php"; 
                        </script>'; <?php
                        exit(); 

                    }else{
                    if($fechaB>$fecha_fi){

                        ?>
                        <script type="text/javascript">
                        alert("No puede tomar este horario, seleccione otra fecha de inicio de su reserva.");
                        window.location.href="../homepagereservas.php"; 
                     
                        </script>'; <?php
                        exit(); 
                        
                    }}
                    }else{ 
                            if($fecha_inici<=$fechaB && $fechaB<=$fecha_fi){
                                if($fecha_inici<=$fechaA && $fechaA<=$fecha_fi){
                                    ?>
                                <script type="text/javascript">
                                alert("No puede tomar este horario, seleccione otro horario.");
                                window.location.href="../homepagereservas.php"; 
                          
                                </script>'; <?php
                                exit(); 
                             
                                }else{
                                        if($fechaA<$fecha_inici){

                                            ?>
                                        <script type="text/javascript">
                                        alert("No puede tomar este horario, seleccione otra fecha de inicio de su reserva.");
                                        window.location.href="../homepagereservas.php"; 
                                    
                                        </script>'; <?php
                                        exit(); 
                                  
                                        }}
                                }else{   if($fecha_inici>$fechaA && $fechaB>$fecha_fi){

                                    ?>
                                        <script type="text/javascript">
                                        alert("No puede tomar este horario, seleccione otro.");
                                        window.location.href="../homepagereservas.php"; 
                                      
                                        </script>'; <?php
                                        exit(); 
                                  
                               }
        
                    }  
    
                }
                
            
            }}

            $femax=strtotime($fechaini."+ 2 day");
            $fetermax = strtotime($fechater);

                if($fetermax>$femax){
                    ?>
                                        <script type="text/javascript">
                                        alert("No puedes hacer una reserva de más de 2 días.");
                                        window.location.href="../homepagereservas.php"; 
                                        </script>'; <?php
                                        exit(); 

                }
        
        
    
    
 
    $insertar=mysqli_query ($con,"INSERT INTO reserva(rut_usuario,cod_espacioC,Fecha_inicio,Fecha_fin)VALUES('$rut_u','$espac','$fechaini','$fechater')");

    

    if($insertar==1){ ?>

        <script type="text/javascript">
            alert("¡Reserva guardada con éxito!");
            window.location.href="../vreserva.php"; 
            
        </script>'; <?php
        
        }
        ?>
    
    
          

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
