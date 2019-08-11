<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
// connect to database
include '../modelo/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Marco Cubaque">
    <title>Factura</title>
    <link rel="icon" href="img/logoAldami.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
    
    <a href='listarVentas.php'> <button type='button' class='btn btn-info'>Listar Ventas</button></a>

    <div class="container text-center">
    <form class="form-horizontal" role="form" method="POST" action="factura.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Seleccionar Cliente</h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3 field-label-responsive">
                <label for="documento"></label>
            </div>
            <div class="col-md-6">
                <div class="form-group text-center">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-address-card-o"></i></div>
                        <input type="text" name="id_cliente" class="form-control" id="id_cliente"
                               placeholder="Documento de identidad" required autofocus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-3 text-center"></div>
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary "><i class="fa fa-search"></i>Buscar</button>
                <br>
            </div>
        </div>
    </form>
</div>

 
</body>
</html>


<?php 
include 'navbar.php';
$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "0";
// page headers
$sentenciaC="SELECT * FROM cliente WHERE clienumerodoc=".$id_cliente; 
 
$resultadoc=Conectarse()->query($sentenciaC) or die (mysqli_error($conexion));
 
// count number of rows returned
// $num=$stmt->rowCount();
  
    //start table
    
    // our table heading
    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<th class='textAlignLeft'>Identificacion</th>";
        echo "<th>Nombre</th>";
            echo "<th style='width:15em;'>Apellido</th>";
            echo "<th>Email</th>";
            echo "<th>Direccion</th>";
            echo "<th>Ciudad</th>";
    echo "</tr>";



         
    
     
    while ($filas=$resultadoc->fetch_assoc()) { 
        extract($filas);
       
        echo "<tr>";
            echo "<td>"; echo "<div class='clienumerodoc'>{$clienumerodoc}</div>"; echo "</td>";
            echo "<td>"; echo "<div class='clienombre'>{$clienombre}</div>"; echo "</td>";
            echo "<td>"; echo "<div class='clieapellido'>{$clieapellido}</div>"; echo "</td>";
            echo "<td>"; echo "<div class='clieemail'>{$clieemail}</div>"; echo "</td>";
            echo "<td>"; echo "<div class='cliedireccion'>{$cliedireccion}</div>"; echo "</td>";
            echo "<td>"; echo "<div class='ciudad'>{$ciudad}</div>"; echo "</td>";
        echo "</tr>";
        echo "</table>";
             
        
    }
     
?>


<?php 

// parameters
$acciones = isset($_GET['acciones']) ? $_GET['acciones'] : "";
$prodmarca = isset($_GET['prodmarca']) ? $_GET['prodmarca'] : "";
$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : "0";
$subtotal = isset($_GET['subtotal']) ? $_GET['subtotal'] : "0";
$prodid = isset($_GET['prodid']) ? $_GET['prodid'] : "0";
 
// display a message
if($acciones=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> fue eliminado del carrito!";
    echo "</div>";
}
 
else if($acciones=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> la cantidad ha sido actualizada!";
    echo "</div>";
}
 
else if($acciones=='failed'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> no se pudo actualizar la cantidad!";
    echo "</div>";
}
 
else if($acciones=='invalid_value'){
        echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> cantidad es inválida!";
    echo "</div>";
}
 
// select products in the cart
$sentencia="SELECT prodid, prodmarca, prodprecio, cantidad, cantidad * prodprecio AS subtotal  
            FROM factura   
                LEFT JOIN producto  
                    ON id_producto = prodid"; 
 
$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
 
// count number of rows returned
// $num=$stmt->rowCount();
  
    //start table
    
    // our table heading
    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
        echo "<th class='textAlignLeft'>Nombre del producto</th>";
        echo "<th>Precio</th>";
            echo "<th style='width:15em;'>Cantidad</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Acciones</th>";

            echo "<td>";
            echo "<a href='venta.php' class='btn btn-info'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> + Productos";
            echo "</a>";
    echo "</td>";
    echo "</tr>";



         
    $total=0;
     
    while ($filas=$resultado->fetch_assoc()) { 
        extract($filas);
       
        echo "<tr>";
            echo "<td>";
                        echo "<div class='prodid' style='display:none;'>{$prodid}</div>";
                        echo "<div class='prodmarca'>{$prodmarca}</div>";
            echo "</td>";
            echo "<td>"; echo $filas['prodprecio']; echo "</td>";
            echo "<td>";
                        echo "<div class='input-group text-center'>";
                            echo "<input type='number' name='cantidad' value='{$cantidad}' class='form-control'>";
                        echo "</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($subtotal, 2, '.', ',') . "</td>";
                echo "<td>";
            echo "<a href='../controlador/eliminarFactura.php?prodid={$prodid}&prodmarca={$prodmarca}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Eliminar";
            echo "</a>";
            echo "</td>";
        echo "</tr>";
             
        $total += $subtotal;
    }
     
    echo "<tr>";
    echo "<td><b>Total</b></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>&#36;" . number_format($total, 2, '.', ',') . "</td>";
    echo "<td>";
    echo "<form method='POST' action='../controlador/generarVenta.php'";
            echo "<input type='hidden' name='nero' value='1562739' class='form-control'>";
            echo "<input type='hidden' name='id_cliente' value='{$id_cliente}' class='form-control'>";
            echo "<input type='hidden' name='id_producto' value='{$prodid}' class='form-control'>";
            echo "<input type='hidden' name='cantidad' value='{$cantidad}' class='form-control'>";
            echo "<input type='hidden' name='subtotal' value='{$subtotal}' class='form-control'>";
            echo "<input type='hidden' name='total' value='{$total}' class='form-control'>";
            echo "<button class='btn btn-info' type='submit'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Registrar";
            echo "</button>";
    echo "</td>";
    echo "</form>";
    echo "<td>";
    echo "<form method='POST' target='_blank' action='facturaPdf2.php'";
            echo "<input type='hidden' name='id_cliente' value='{$id_cliente}' class='form-control'>";
            echo "<input type='hidden' name='id_cliente' value='{$id_cliente}' class='form-control'>";
            echo "<input type='hidden' name='total' value='{$total}' class='form-control'>";
            echo "<button class='btn btn-success' type='submit'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Facturar";
            echo "</button>";
    echo "</td>";
    echo "</form>";
    echo "</tr>";
         
    echo "</table>";



include 'footerFactura.php';
 
?>
