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
    <title>Productos Aldami</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>
	

			<a href='agregar_producto.php'> <button type='button' class='btn btn-info'>Agregar Producto</button></a> 
			<a href='productosPorProveedor.php'> <button type='button' class='btn btn-info'>Ver productos por proveedor</button> </a>
			<a href='reporteProductos.php'> <button type='button' class='btn btn-info'>Criterios de Orden</button> </a>
			<a href='productosPdf.php'> <button type='button' class='btn btn-warning'>Exportar a PDF</button></a>
					
			<h3>LISTADO DE PRODUCTOS</h3>
			
			<table class="table table-hover text-center mt-3">
				<thead>
					<th class="text-center">Id_Producto</th>
					<th class="text-center">Id_Proveedor</th>
					<th class="text-center">Marca</th>
					<th class="text-center">Genero</th>
					<th class="text-right">Precio</th>
					<th class="text-right">Color</th>
					<th class="text-center">Descripcion</th>
				</thead>
				<?php
				include "../modelo/conexion.php";
				$sentencia="SELECT * FROM producto";
				$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
				while ($filas=$resultado->fetch_assoc()) {
					echo "<tr>";
						echo "<td>"; echo $filas['prodid']; echo "</td>";
						echo "<td>"; echo $filas['provid']; echo "</td>";
						echo "<td>"; echo $filas['prodmarca']; echo "</td>";
						echo "<td>"; echo $filas['prodgenero']; echo "</td>";
						echo "<td>"; echo $filas['prodprecio']; echo "</td>";
						echo "<td>"; echo $filas['prodcolor']; echo "</td>";
						echo "<td>"; echo $filas['prodescripcion']; echo "</td>";
						echo "<td> <a href='modificar_prod.php?prodid=".$filas['prodid']."'> <button type='button' class='btn btn-info'>Modificar</button> </a> </td>";
						echo "<td> <a id='url'  OnClick='ConfirmEliminarProducto();return false;' href='../controlador/eliminarProducto.php?prodid=".$filas['prodid']."'> <button type='button' class='btn btn-warning'>Eliminar</button> </a> </td>";
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

