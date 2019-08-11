<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <title>Registrar Venta</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
    <div id="divEncabezado"><?php include "encabezado.php";?></div>
    <div id="divMenu"> <?php include "navbar.php";?> </div>    
    <br>
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="confirmaCliente.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="text-center">Datos del Cliente</h2>
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
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-clone"></i></div>
                        <input type="text" name="clienumerodoc"  value="<?php if(isset($_POST['clienumerodoc'])) {echo $_POST['clienumerodoc'];}?>" class="form-control" id="clienumerodoc"
                               placeholder="Documento de identidad" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user-plus "></i> Agregar Datos a Factura</button>
                <br>
            </div>
        </div>
    </form>
</div>