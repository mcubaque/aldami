<?php 
nuevoCliente($_POST['clienumerodoc'], $_POST['clienombre'], $_POST['clieapellido'], $_POST['clieemail'], $_POST['cliedireccion'], $_POST['cliefechanacimiento'], $_POST['ciudad']);
function nuevoCliente($clienumerodoc, $clienombre, $clieapellido, $clieemail, $cliedireccion, $cliefechanacimiento, $ciudad){
	include "../modelo/conexion.php";
	$sentencia = "INSERT INTO cliente (clienumerodoc, clienombre, clieapellido, clieemail, cliedireccion, cliefechanacimiento, ciudad) VALUES ('".$clienumerodoc."', '".$clienombre."', '".$clieapellido."', '".$clieemail."', '".$cliedireccion."', '".$cliefechanacimiento."', '".$ciudad."')";
	Conectarse()->query($sentencia) or die("Error al ingresar los datos");
}
?>

 <script type="text/javascript">
 	alert("Cliente Ingresado Exitosamente");
 	window.location.href = "../vista/clientes.php";
 </script>	