<?php 
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
include "../modelo/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<title>Agregar Cliente</title>
    <link rel="icon" href="img/logoAldami.ico">
</head>
<body>
	
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>
	
	
	<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="../controlador/agregarCliente.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Agregar Cliente</h2>
                <hr>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="documento">Documento</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-address-card-o"></i></div>
                        <input type="text" name="clienumerodoc" class="form-control" id="clienumerodoc"
                               placeholder="Documento de identidad" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="nombre">Nombre</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="clienombre" class="form-control" id="clienombre"
                               placeholder="Nombre" required>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="apellido">Apellido</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-smile-o"></i>
                        </div>
                        <input type="text" name="clieapellido" class="form-control"
                               id="clieapellido" placeholder="Apellido" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">Email</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" name="clieemail" class="form-control"
                               id="clieemail" placeholder="Email" required>
                    </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="direccion">Direccion</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-globe"></i>
                        </div>
                        <input type="text" name="cliedireccion" class="form-control"
                               id="cliedireccion" placeholder="Direccion" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="nacimiento">Fecha Nacimiento</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-birthday-cake"></i>
                        </div>
                        <input type="text" name="cliefechanacimiento" class="form-control"
                               id="cliefechanacimiento" placeholder="Fecha de Nacimiento" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="ciudad">Ciudad</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-compass"></i>
                        </div>
                        <input type="text" name="ciudad" class="form-control"
                               id="ciudad" placeholder="Ciudad" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user-plus "></i> Agregar</button>
                <br>
            </div>
        </div>
    </form>
</div>



	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<div id="divPiePagina"><?php include "footer.php";?> </div>

</body>
</html>


			