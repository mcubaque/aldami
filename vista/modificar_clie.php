<?php 
session_start();
extract($_POST); 

$consulta = consultarCliente($_GET['clienumerodoc']);
function consultarCliente($no_clie){
	include "../modelo/conexion.php";
	$sentencia = "SELECT * FROM cliente WHERE clienumerodoc = '".$no_clie."'";
	$resultado = Conectarse()->query($sentencia) or die(mysqli_error($conexion));
	$filas = $resultado->fetch_assoc();
	return[
		$filas['clienumerodoc'],
		$filas['clienombre'],
		$filas['clieapellido'],
		$filas['clieemail'],
		$filas['cliedireccion'],
		$filas['cliefechanacimiento'],
		$filas['ciudad'],
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
	<title>Modofocar Clientes</title>
	<link rel="icon" href="img/logoAldami.ico">
</head>
<body>
<div id="divEncabezado"><?php include "encabezado.php";?></div>
<div id="divMenu"> <?php include "navbar.php";?> </div>


	<div class="container">
		<div class="row">
			
			<h3>MODIFICAR CLIENTE</h3>
			<hr>
			<div class="container">
			<form class="form-horizontal" action="../controlador/modificar_cliente.php" method="POST">
				<div class="form-group">
					<input type="hidden" name="clienumerodoc" value="<?php echo $_GET['id_usuario']?>">
					<label class="col-sm-3 control-label">Documento</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="clienumerodoc" name="clienumerodoc" value="<?php echo $consulta[0] ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="clienombre" name="clienombre" value="<?php echo $consulta[1] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellido</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="clieapellido" name="clieapellido" value="<?php echo $consulta[2] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-4">
						<input class="form-control" type="email" id="clieemail" name="clieemail" value="<?php echo $consulta[3] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Direccion</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="cliedireccion" name="cliedireccion" value="<?php echo $consulta[4] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha_Nacimiento</label>
						<div class="col-sm-4">
						<input class="form-control" type="date" id="cliefechanacimiento" name="cliefechanacimiento" value="<?php echo $consulta[5] ?>"> <br>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Ciudad</label>
						<div class="col-sm-4">
						<input class="form-control" type="text" id="ciudad" name="ciudad" value="<?php echo $consulta[6] ?>"> <br>
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
