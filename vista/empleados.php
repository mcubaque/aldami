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
	<title>Empleados</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link rel="icon" href="img/logoAldami.ico">
    <script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>

    <a href='agregar_empleado.php'> <button type='button' class='btn btn-info'>Agregar Empleado</button> </a>
    
                    
            <h3>LISTADO DE EMPLEADOS</h3>
            
            <table class="table table-hover text-center mt-3">
                <thead>
                    <th class="text-center">No. de Documento</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Cargo</th>
                    <th class="text-right">Email</th>
                    <th class="text-right">Telefono</th>
                </thead>
                <?php
                include "../modelo/conexion.php";
                $sentencia="SELECT * FROM empleado";
                $resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
                while ($filas=$resultado->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>"; echo $filas['emplenumerodoc']; echo "</td>";
                        echo "<td>"; echo $filas['emplenombre']; echo "</td>";
                        echo "<td>"; echo $filas['empleapellido']; echo "</td>";
                        echo "<td>"; echo $filas['emplecargo']; echo "</td>";
                        echo "<td>"; echo $filas['empleemail']; echo "</td>";
                        echo "<td>"; echo $filas['empletelefono']; echo "</td>";
                        
                        echo "<td> <a href='modificar_empleado.php?idEmpleado=".$filas['emplenumerodoc']."'> <button type='button' class='btn btn-info'>Modificar</button> </a> </td>";
                        echo "<td> <a id='eliminarEmple' OnClick='ConfirmEliminarEmpleado();return false;' href='../controlador/eliminarEmpleado.php?idEmpleado=".$filas['emplenumerodoc']."'> <button type='button' class='btn btn-warning'>Eliminar</button> </a> </td>";
                    echo "</tr>";   
                 } 
                 ?>
            </table>   


	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>

