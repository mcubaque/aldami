<?php 
session_start();
$consulta = consultarProducto($_GET['prodid']);
function consultarProducto($no_prod){
	include "../modelo/conexion.php";
	$sentencia = "SELECT * FROM producto WHERE prodid = '".$no_prod."'";
	$resultado = Conectarse()->query($sentencia) or die(mysqli_error($conexion));
	$filas = $resultado->fetch_assoc();
	return[
		$filas['prodid'],
		$filas['provid'],
		$filas['prodmarca'],
		$filas['prodgenero'],
		$filas['prodprecio'],
		$filas['prodcolor'],
		$filas['prodescripcion'],
	];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<title>Accesando a bases de datos</title>
	<link rel="icon" href="img/logoAldami.ico">
</head>
<body>
<div id="divEncabezado"><?php include "encabezado.php";?></div>
<div id="divMenu"> <?php include "navbar.php";?> </div>


	<div class="container">
		<div class="row">
			
			<h3>MODIFICAR PRODUCTO</h3>
			<hr>
			<div class="container">
			<form class="form-horizontal" action="../controlador/modificarProducto.php" method="POST">
				<div class="form-group">
					<input type="hidden" name="prodid" value="<?php echo $_GET['prodid']?>">
					<label class="col-sm-3 control-label">Id Producto</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodid" name="prodid" value="<?php echo $consulta[0] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Proveedor</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="provid" name="provid" value="<?php echo $consulta[1] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Marca</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodmarca" name="prodmarca" value="<?php echo $consulta[2] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Genero</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodgenero" name="prodgenero" value="<?php echo $consulta[3] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Precio</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodprecio" name="prodprecio" value="<?php echo $consulta[4] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Color</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodcolor" name="prodcolor" value="<?php echo $consulta[5] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Descripcion</label>
						<div class="col-sm-4">
						<textarea  class="form-control" name="prodescripcion"> <?php echo $consulta[6] ?> </textarea> 
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-success btn-block">Guardar</button>
						    
					</div>
				</div>
				
			</form>
			</div>
		</div>
	</div>

	
<br>
<br>
<br>
<br>
<br>


	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>
