<?php 
session_start();
extract($_POST); 

$consulta = consultarUsuario($_GET['id_usuario']);
function consultarUsuario($no_usu){
	include "../modelo/conexion.php";
	$sentencia = "SELECT * FROM usuarios WHERE id_usuario = '".$no_usu."'";
	$resultado = Conectarse()->query($sentencia) or die(mysqli_error($conexion));
	$filas = $resultado->fetch_assoc();
	return[
		$filas['id_usuario'],
		$filas['email'],
		$filas['password'],
		$filas['tipo_usuario'],
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
	<title>Modofocar usuarios</title>
	<link rel="icon" href="img/logoAldami.ico">
</head>
<body>
<div id="divEncabezado"><?php include "encabezado.php";?></div>
<div id="divMenu"> <?php include "navbar.php";?> </div>


	<div class="container">
		<div class="row">
			
			<h3>MODIFICAR USUARIO</h3>
			<hr>
			<div class="container">
			<form class="form-horizontal" action="../controlador/modificar_usuario.php" method="POST">
				<div class="form-group">
					<input type="hidden" name="id_usuario" value="<?php echo $_GET['id_usuario']?>">
					<label class="col-sm-3 control-label">Id Usuario</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="id_usuario" name="id_usuario" value="<?php echo $consulta[0] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="email" name="email" value="<?php echo $consulta[1] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="password" name="password" value="<?php echo $consulta[2] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tipo de Usuario</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="tipo_usuario" name="tipo_usuario" value="<?php echo $consulta[3] ?>"> <br>
					</div>
				</div>
		
				<div class="form-group">
					<label class="col-sm-3 control-label"></label>
						<div class="col-sm-4">
							<button type="submit" class="btn btn-primary btn-block">Guardar</button>    
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>
