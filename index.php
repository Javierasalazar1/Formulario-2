<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar sesion </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <style>
body {
  background-image: url('img/3fondo.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>

  


</head>

<body>

</body>



<div class="container">
  <h1></h1>
  
  <form action="iniciarsesion.php" class="was-validated" method="POST">
    <div class="container-fluid"> 
    
           <div  class="col-sm-12 my-auto" style="width: 40%; margin:0 auto; padding-top: 100px;" > 
                    <div class="card"> 
                        <div class="card-header text-center" style="background: #2C3E50; color: #fff">
                          

                        </div>
                    <fieldset>
                        <div class="card-body" style="background: #1f0a76; color: #fff;">



  <div class="container" style="background: #1f0a76; color: #fff;">
  <h3>Iniciar sesión </h3>
  <form action="  ">
    <div class="form-group">
      <label for="email">Usuario:</label>
      <input type="text" class="form-control" id="usuario" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Ingresar usuario" name="usuario" required>
    </div>
    <div class="form-group">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" pattern="[A-Za-z0-9_-]{1,15}" required placeholder="Ingresar contraseña" name="pswd" required>
    </div>
    
    <button type="submit" style="margin-left: 38%" class="btn btn-success">Ingresar</button>
   
  </form>
  </div>
        <?php
             if(!empty($_GET['error1'])){
                 if($_GET['error1']=='pass'){
        ?>
            <div style="padding: 10px; margin-top: 17px; margin-left: 15px; margin-right: 15px;" class="alert alert-danger" role="alert">
                 Usuario o contraseña incorrectos
            </div>
        <?php
                }
            }
         ?>
</html>











