<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proveedores</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>
<div class="m-4">
	<h3>Resultado de busqueda</h3>
</div>
	


<?php 
extract($_POST);
require "../modelo/conexion.php";
require "../modelo/proveedor.php";

$palabraBuscada=$_POST['buscarProveedorVsProducto'];
if(isset($_POST['buscarProveedorVsProducto'])){
	$objProducto = new Proveedor();
	$resultado=$objProducto->buscarProveedorVsProducto($_POST['buscarProveedorVsProducto']);
	
	if (isset($resultado)){
		if ($resultado->num_rows>0) {


?>
		
			<h6 align="center">Todos los resultados para: <?php echo $palabraBuscada?></h6>
			<table class="table table-hover text-center class="m-4"> 
				<thead>
					<th class="text-center">Nombre o marca de producto</th>
					<th class="text-center">Genero producto</th>
					<th class="text-center">Precio</th>
					<th class="text-center">Nombre del proveedor</th>
					<th class="text-center">Contacto</th>
					<th class="text-center">Telefono</th>
					
				</thead>
		
<?php 			
while ($registro=$resultado->fetch_object()) {

	?>
	
	<tr >
		<td ><?php echo $registro->prodmarca ?></td>
		<td ><?php echo $registro->prodgenero ?></td>
		<td ><?php echo $registro->prodprecio?></td>
		<td ><?php echo $registro->proveenombre ?></td>
		<td ><?php echo $registro->proveecargocontacto ?></td>
		<td ><?php echo $registro->proveetelefono ?></td>
		
		></td>
	</tr>
	
	<?php // abre nuevemente php para cerrar el ciclo
}	//cierro el ciclo
?>			

</table>
<a class="m-4" 
href="productosPOrProveedor.php"> <button  class="btn btn-primary ">volver</button></a>

<?php 
		}else{
			echo "<div class='m-4 alert alert-danger text-center'>No se encontro ningun registro </div>";
		}

	}
}


?>





