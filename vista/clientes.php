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
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"/>
	<title>Clientes</title>
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

<a href='agregar_cliente.php'> <button type='button' class='btn btn-info'>Nuevo Cliente</button> </a>
<h3 class="text-center">LISTADO DE CLIENTES</h3>
            
            <table class="table table-hover text-center mt-3">
                <thead>
                    <th class="text-center">Documento</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Email</th>
                    <th class="text-right">Direccion</th>
                    <th class="text-right">Fecha_Nacimiento</th>
                    <th class="text-center">Ciudad</th>
                </thead>
                <?php
                include "../modelo/conexion.php";
                $sentencia="SELECT * FROM cliente order by clienombre";
                $resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
                while ($filas=$resultado->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>"; echo $filas['clienumerodoc']; echo "</td>";
                        echo "<td>"; echo $filas['clienombre']; echo "</td>";
                        echo "<td>"; echo $filas['clieapellido']; echo "</td>";
                        echo "<td>"; echo $filas['clieemail']; echo "</td>";
                        echo "<td>"; echo $filas['cliedireccion']; echo "</td>";
                        echo "<td>"; echo $filas['cliefechanacimiento']; echo "</td>";
                        echo "<td>"; echo $filas['ciudad']; echo "</td>";
                        echo "<td> <a href='modificar_clie.php?clienumerodoc=".$filas['clienumerodoc']."'> <button type='button' class='btn btn-info'>Modificar</button> </a> </td>";
                        echo "<td> <a id='eliminarCli'  OnClick='ConfirmEliminarCliente();return false;' href='../controlador/eliminarCliente.php?clienumerodoc=".$filas['clienumerodoc']."'> <button type='button' class='btn btn-warning'>Eliminar</button> </a> </td>";
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