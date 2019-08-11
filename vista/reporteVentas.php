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
    <meta name="author" content="Aldami">
    <title>Reporte de Ventas</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>
	

			<br>
			<div class="container text-center">
    <form class="form-horizontal" role="form" method="POST" action="reporteVentas.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Seleccionar Cliente</h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3 field-label-responsive">
                <label for="documento"></label>
            </div>
            <div class="col-md-6">
                <div class="form-group text-center">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="text" name="identificacion" class="form-control" id="identificacion"
                               placeholder="Documento de identidad" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3 text-center"></div>
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i>Buscar</button>
                <br>
            </div>
        </div>
    </form>
</div>
<?php 
$clienumerodoc = isset($_POST['identificacion']) ? $_POST['identificacion'] : "";
 ?>
					
			<h3 class="text-center">REPORTE DE VENTAS</h3>
			
			<table class="table table-hover text-center mt-3">
				<thead>
					<th class="text-center">Fecha Compra</th>
					<th class="text-center">Id Empleado</th>
					<th class="text-center">Numero de pedido</th>
				</thead>
				<?php
				include "../modelo/conexion.php";
				$sentencia="SELECT pedfecha, emplenumdoc, clienumerodoc, pednumero FROM cliente, pedido WHERE clienumerodoc = clienumdoc AND pedidoid = pednumero AND clienumdoc = ".$clienumerodoc;
				$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
				while ($filas=$resultado->fetch_assoc()) {
					echo "<tr>";
						echo "<td>"; echo $filas['pedfecha']; echo "</td>";
						echo "<td>"; echo $filas['emplenumdoc']; echo "</td>";
						echo "<td>"; echo $filas['pednumero']; echo "</td>";
					echo "</tr>";
					

				 } 
				 ?>
			</table>	
		</div>
	</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>	

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>

