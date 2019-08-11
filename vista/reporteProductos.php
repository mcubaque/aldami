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
    <title>Reporte Productos</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
  </head>

<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>

	<?php include "../modelo/conexion.php"; ?>

	<?php 
	if(isset($_POST['filtro'])){
		switch($_POST['filtro']){
			case "todos":
				$sql = "select * from producto;";
				break;
			case "genero":
				$sql = "select * from producto order by prodgenero desc;";
				break;
			case "caros":
				$sql = "select * from producto order by prodprecio desc;";
				break;
			case "economicos":
				$sql = "select * from producto order by prodprecio asc;";
				break;
			case "proveedor":
				$sql = "select * from producto order by provid asc;";
				break;
		}
	}else{
		$sql = "select * from producto;";
	}
?>
<br>

<h3 class="text-center">Informe de Productos</h3>
<table class="table table-hover text-center">
<div id="filtros" class="text-center">
Criterios de Orden 
<form action="reporteProductos.php" method="post">
	<select name="filtro">
		<option value="todos">Todos</option>
		<option value="genero">Ordenar por Genero</option>
		<option value="caros">Mas Caros</option>
		<option value="economicos">Mas Economicos</option>
		<option value="proveedor">Ordenar por Proveedor</option>
	</select> 
	<button type="submit" type='button' class='btn btn-info'>Filtrar</button>
</form>
</div>
</table>
<div id="producto">
	<?php
		$resultado=Conectarse()->query($sql) or die (mysqli_error($conexion));
		
		
		echo "<table class='table table-hover text-center mt-3'><th>Id</th><th>Proveedor</th><th>Marca</th><th>Genero</th><th>Precio</th><th>Color</th><th>Descripcion</th>";

		while ($row=$resultado->fetch_assoc()) {
		
		    echo "<tr>";
				echo "<td>"; echo $row['prodid']; echo "</td>";
				echo "<td>"; echo $row['provid']; echo "</td>";
				echo "<td>"; echo $row['prodmarca']; echo "</td>";
				echo "<td>"; echo $row['prodgenero']; echo "</td>";
				echo "<td>"; echo $row['prodprecio']; echo "</td>";
				echo "<td>"; echo $row['prodcolor']; echo "</td>";
				echo "<td>"; echo $row['prodescripcion']; echo "</td>";
			echo "</tr>";
		} 
		echo "</table></center>";
		
	?>
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

