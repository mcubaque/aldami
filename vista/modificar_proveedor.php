<?php 
session_start(); 
$consulta = consultarProveedor($_GET['ProveeId']);
function consultarProveedor($no_proveedor){
	include "../modelo/conexion.php";
	$sentencia = "SELECT * FROM proveedor WHERE ProveeId = '".$no_proveedor."'";
	$resultado = Conectarse()->query($sentencia) or die(mysqli_error($conexion));
	$filas = $resultado->fetch_assoc();
	 
	return [
		$filas['ProveeId'],
		$filas['proveenombre'],
		$filas['proveecargocontacto'],
		$filas['proveetelefono'],
		$filas['proveedireccion'],
		
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
			
			<h3>MODIFICAR PROVEEDOR</h3>
			<hr>
			<div class="container">
			<form class="form-horizontal" action="../controlador/modificarProveedor.php" method="POST">
				<div class="form-group">
					<input type="" name="ProveeId" value="<?php echo $_GET['ProveeId']?>">
					<label class="col-sm-3 control-label">Nit Proveedor</label>
						<div class="col-sm-4">
						<input class="form-control" type="hidden" id="ProveeId" name="ProveeId" value="<?php echo $consulta[0] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre Proveedor</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="provid" name="proveenombre" value="<?php echo $consulta[1] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cargo Contacto</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodmarca" name="proveecargocontacto" value="<?php echo $consulta[2] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telefono contacto</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodgenero" name="proveetelefono" value="<?php echo $consulta[3] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Direccion Proveedor</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="prodprecio" name="proveedireccion" value="<?php echo $consulta[4] ?>"> <br>
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

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>




