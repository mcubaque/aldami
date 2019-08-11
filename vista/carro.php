<?php
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión
// connect to database
include '../modelo/conexion.php';

$id_cliente = isset($_POST['id_cliente']) ? $_POST['id_cliente'] : "";
$id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : "";
$cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
$subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : "";
$total = isset($_POST['total']) ? $_POST['total'] : "";
 
// page headers
$page_title="Carrito";
include 'encabezadoTienda.php';
 
// parameters
$acciones = isset($_GET['acciones']) ? $_GET['acciones'] : "";
$prodmarca = isset($_GET['prodmarca']) ? $_GET['prodmarca'] : "";
 
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
            FROM cart_items   
                LEFT JOIN producto  
                    ON id_producto = prodid"; 
 
$resultado=Conectarse()->query($sentencia) or die (mysqli_error($conexion));
 
// count number of rows returned
// $num=$stmt->rowCount();
  
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
     
    // our table heading
    echo "<tr>";
        echo "<th class='textAlignLeft'>Nombre del producto</th>";
        echo "<th>Precio</th>";
            echo "<th style='width:15em;'>Cantidad</th>";
            echo "<th>Sub Total</th>";
            echo "<th>Acciones</th>";

            echo "<td>";
            echo "<a href='tiendaldami.php' class='btn btn-success'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Seguir Comprando";
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
                        echo "<div class='input-group'>";
                            echo "<input type='number' name='cantidad' value='{$cantidad}' class='form-control'>";
                             
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-info update-quantity' type='button'><i class='glyphicon glyphicon-refresh'></i> Actualizar</button>";
                            echo "</span>";
                             
                        echo "</div>";
                echo "</td>";
                echo "<td>&#36;" . number_format($subtotal, 2, '.', ',') . "</td>";
                echo "<td>";
            echo "<a href='../controlador/eliminarCarrito.php?prodid={$prodid}&prodmarca={$prodmarca}' class='btn btn-danger'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Quitar del carrito";
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
    echo "<form method='POST' target='_blank' action='facturaPdf.php'";
            echo "<input type='hidden' name='nero' value='{$id_cliente}' class='form-control'>";
            echo "<input type='hidden' name='id_cliente' value='{$_SESSION['user']}' class='form-control'>";
            echo "<input type='hidden' name='total' value='{$total}' class='form-control'>";
            echo "<button class='btn btn-success' type='submit'>";
            echo "<span class='glyphicon glyphicon-shopping-cart'></span> Facturar";
            echo "</button>";
    echo "</td>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
         
    echo "</table>";



include 'footerCarrito.php';
 
?>