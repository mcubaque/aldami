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
    <title>Listado Usuarios</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>

  </head>

<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>
	

					
			<h3 class="text-center">LISTADO DE USUARIOS</h3>
			
			<table class="table table-hover text-center mt-3">
				<thead>
					<th class="text-center">Id Usuario</th>
					<th class="text-center">Email</th>
					<th class="text-center">Tipo de usuario</th>
				</thead>
				<?php
				include "../modelo/conexion.php";
				$sentencia="SELECT * FROM Usuarios";
				$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
				while ($filas=$resultado->fetch_assoc()) {
					echo "<tr>";
						echo "<td>"; echo $filas['id_usuario']; echo "</td>";
						echo "<td>"; echo $filas['email']; echo "</td>";
						echo "<td>"; echo $filas['tipo_usuario']; echo "</td>";
						echo "<td> <a href='modificar_usu.php?id_usuario=".$filas['id_usuario']."'> <button type='button' class='btn btn-info'>Modificar</button> </a> </td>";
						echo "<td> <a id='eliminarUsu'  OnClick='ConfirmEliminarUsuario();return false;' href='../controlador/eliminarUsuario.php?id_usuario=".$filas['id_usuario']."'> <button type='button' class='btn btn-warning'>Eliminar</button> </a> </td>";
					echo "</tr>";	
				 } 
				 ?>
			</table>	
		</div>
	</div>

	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>