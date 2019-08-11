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
    <title>Listado de Ventasi</title>
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
<a href='factura.php'> <button type='button' class='btn btn-info'>Volver</button></a>

<?php 
	if(isset($_POST['filtro'])){
		switch($_POST['filtro']){
			case "todos":
				$sentencia="SELECT id_venta, id_cliente, id_producto, total, fecha_venta, clienombre, clieapellido FROM ventas, cliente WHERE id_cliente = clienumerodoc;";
				break;
			case "caros":
				$sentencia="SELECT id_venta, id_cliente, id_producto, total, fecha_venta, clienombre, clieapellido FROM ventas, cliente WHERE id_cliente = clienumerodoc ORDER BY total DESC;";
				break;
			case "economicos":
				$sentencia="SELECT id_venta, id_cliente, id_producto, total, fecha_venta, clienombre, clieapellido FROM ventas, cliente WHERE id_cliente = clienumerodoc ORDER BY total ASC;";
				break;
		}
	}else{
		$sentencia="SELECT id_venta, id_cliente, id_producto, total, fecha_venta, clienombre, clieapellido FROM ventas, cliente WHERE id_cliente = clienumerodoc;";
	}
?>
<br>

<h3 class="text-center"></h3>
<table class="table table-hover text-center">
<div id="filtros" class="text-center">
Criterios de Orden 
<form action="listarVentas.php" method="post">
	<select name="filtro">
		<option value="todos">Listado de Clientes</option>
		<option value="caros">Mas costoso</option>
		<option value="economicos">Menos costoso</option>
	</select> 
	<button type="submit" type='button' class='btn btn-info'>Filtrar</button>
</form>
</div>
</table>
<div id="ventas">
			
					
			<h3 class="text-center">LISTADO DE VENTAS</h3>
			
			<table class="table table-hover text-center mt-3">
				<thead>
					<th class="text-center">Id_Venta</th>
					<th class="text-center">Id_Cliente</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Apellido</th>
					<th class="text-center">Id_Producto</th>
					<th class="text-center">Total</th>
					<th class="text-center">Fecha_Venta</th>
				</thead>
				<?php
				include "../modelo/conexion.php";
			
				$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
				while ($filas=$resultado->fetch_assoc()) {
					echo "<tr>";
						echo "<td>"; echo $filas['id_venta']; echo "</td>";
						echo "<td>"; echo $filas['id_cliente']; echo "</td>";
						echo "<td>"; echo $filas['clienombre']; echo "</td>";
						echo "<td>"; echo $filas['clieapellido']; echo "</td>";
						echo "<td>"; echo $filas['id_producto']; echo "</td>";
						echo "<td>"; echo $filas['total']; echo "</td>";
						echo "<td>"; echo $filas['fecha_venta']; echo "</td>";
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

