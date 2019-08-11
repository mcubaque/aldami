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
    <meta name="author" content="Aldami">
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
	<div id="divEncabezado"><?php include "encabezado.php";?></div>
	<div id="divMenu"> <?php include "navbar.php";?> </div>

    <a href='agregar_proveedor.php'> <button type='button' class='btn btn-info'>Agregar Proveedor</button> </a>
    <a href='productosPorProveedor.php'> <button type='button' class='btn btn-info'>Ver productos por proveedo</button> </a>
    
                    
            <h3>LISTADO DE PROVEEDORES</h3>
            
            <table class="table table-hover text-center mt-3">
                <thead>
                    <th class="text-center">Nit Proveedor</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Contacto</th>
                    <th class="text-center">Telefono</th>
                    <th class="text-right">Direccion</th>
                    <th class="text-right">Accion</th>
                </thead>
                <?php
                include "../modelo/conexion.php";
                $sentencia="SELECT * FROM proveedor";
                $resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
                while ($filas=$resultado->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>"; echo $filas['ProveeId']; echo "</td>";
                        echo "<td>"; echo $filas['proveenombre']; echo "</td>";
                        echo "<td>"; echo $filas['proveecargocontacto']; echo "</td>";
                        echo "<td>"; echo $filas['proveetelefono']; echo "</td>";
                        echo "<td>"; echo $filas['proveedireccion']; echo "</td>";
                        
                        echo "<td> <a href='modificar_proveedor.php?ProveeId=".$filas['ProveeId']."'> <button type='button' class='btn btn-info'>Modificar</button> </a> </td>";
                        echo "<td> <a id='eliminarProvee' href='../controlador/eliminarProveedor.php?ProveeId=".$filas['ProveeId']."' OnClick='ConfirmEliminarProveedor();return false;' > <button type='button' class='btn btn-warning'>Eliminar</button> </a> </td>";
                    echo "</tr>";   
                 } 
                 ?>
            </table>    



	<div id="divPiePagina"><?php include "footer.php";?> </div>
</body>
</html>

