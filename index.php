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
  background-image: url('img/fondo3.jpg');
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
    
           <div  class="col-sm-12 my-auto" style="width: auto; max-width: 600px; margin:0 auto; padding-top: 150px;" > 
                    <div class="card" style ="box-shadow: 0 0 10px #333"> 
                        <div class="card-header text-center" style="background: #b1b4bb; color: #fff; ">          
                          

                        </div>
                    <fieldset>
                        <div class="card-body" style="background: linear-gradient(120deg, rgba(248,246,251,1) 0%, rgba(177,180,187,1) 100%);">



  <div class="container" style="background: linear-gradient(120deg, rgba(248,246,251,1) 0%, rgba(177,180,187,1) 100%);">
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
    
    <button type="submit" style="display: block; margin: 0 auto;" class="btn btn-success">Ingresar</button>


   
  </form>
  </div>
        <?php
             if(!empty($_GET['error1'])){
                 if($_GET['error1']=='pass'){
        ?>
            <div style="padding: 10px; margin-top: 17px; margin-left: 15px; margin-right: 15px; text-align: center" class="alert alert-danger" role="alert">
                 Usuario o contraseña incorrectos
            </div>
        <?php
                }
            }
         ?>
</html>











