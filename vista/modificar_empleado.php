<?php 
session_start();
$consulta = consultarEmpleado($_GET['idEmpleado']);
function consultarEmpleado($idEmpleado){
	include "../modelo/conexion.php";
	$sentencia = "SELECT * FROM empleado WHERE emplenumerodoc = '".$idEmpleado."'";
	$resultado = Conectarse()->query($sentencia) or die(mysqli_error($conexion));
	$filas = $resultado->fetch_assoc();
	return[
		$filas['emplenumerodoc'],
		$filas['emplenombre'],
		$filas['empleapellido'],
		$filas['emplecargo'],
		$filas['empleemail'],
		$filas['empletelefono']
		
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
			
			<h3>MODIFICAR EMPLEADO</h3>
			<hr>
			<div class="container">
			<form class="form-horizontal" action="../controlador/modificarEmpleado.php" method="POST">
				<div class="form-group">
					<input type="" name="idEmpleado" value="<?php echo $_GET['idEmpleado']?>">
					<label class="col-sm-3 control-label">No. de Documento</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="emplenumerodoc" name="emplenumerodoc" value="<?php echo $consulta[0] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="emplenombre" name="emplenombre" value="<?php echo $consulta[1] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="empleapellido" name="empleapellido" value="<?php echo $consulta[2] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cargo</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="emplecargo" name="emplecargo" value="<?php echo $consulta[3] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="empleemail" name="empleemail" value="<?php echo $consulta[4] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telefono</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="empletelefono" name="empletelefono" value="<?php echo $consulta[5] ?>"> <br>
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

	<?php

		$msj=$_GET['msj'];

		if ($msj==1){
		  echo '<div class="alert alert-success text-center">Se ha modificado el empleado Correctamente</div>';
		}
		if ($msj==2){
		 echo '<div class="alert alert-danger text-center">Problemas al agregar, Ya hay un usuario con esa identificación</div>';
		}
	?>

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>
