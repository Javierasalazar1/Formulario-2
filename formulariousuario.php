<?php include("conexion.php") ?>

<?php include("includes/header.php")?>


<style>
   body {
        background-image: url('fondo3.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
</style> 



<div class="container p-4">
    
    <div class="row">

        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])) { ?>
            
            <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
        <?php session_unset(); } ?>

        <div class="card card-body" style="background: #332d2d;">
            <form action="save_task.php" method="POST">

                <div class="form-group">
                    <input type="text" name="rut_usuario" class="form-control" 
                    placeholder="Rut (Sin puntos y con guion)" autofocus>
                </div>
                
                <div class="form-group">
                    <textarea name="nombre_per" rows="2" class="form-control"
                    placeholder="Nombre"></textarea>

                </div>

                <div class="form-group">
                    <textarea name="apellido_per" rows="2" class="form-control"
                    placeholder="Apellido"></textarea>

                </div>
                
                <div class="form-group">
                    <textarea name="telefono_per" rows="2" class="form-control"
                    placeholder="Telefono (Sin +56)"></textarea>

                </div>
                
                <div class="form-group">
                    <textarea name="num_domicilio" rows="2" class="form-control"
                    placeholder="Numero de Domicilio"></textarea>

                </div>
                
                <input type="submit" class="btn btn-success btn-block" 
                name="save_task" value="Guardar Usuario">


            </form>
        </div>

        </div>


        <div class="col-md-8">
            <table class= "table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Rut Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Domicilio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query =  "SELECT * FROM usuarios";
                    $result_tasks = mysqli_query($con, $query);

                    while($row = mysqli_fetch_array($result_tasks)) { ?>

                        <tr>
                            <td><?php echo $row['rut_usuario'] ?></td>
                            <td><?php echo $row['nombre_per'] ?></td>
                            <td><?php echo $row['apellido_per'] ?></td>
                            <td><?php echo "+56 ". $row['telefono_per'] ?></td>
                            <td><?php echo $row['num_domicilio'] ?></td>

                        </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>


    </div>

</div>


<?php include("includes/footer.php")?>


