<?php
// connect to database
include '../modelo/conexion.php';
 
// get the product id
$prodid = isset($_GET['prodid']) ?  $_GET['prodid'] : "";
$prodmarca = isset($_GET['prodmarca']) ?  $_GET['prodmarca'] : "";
$cantidad  = isset($_GET['cantidad']) ?  $_GET['cantidad'] : "";
$cantidad = intval($cantidad);
$id_usuario = 1;
$conexion = Conectarse();
 
// delete query
$query = "UPDATE factura SET cantidad=? WHERE id_producto=? AND id_usuario=?";
 
// prepare query
$resultado = mysqli_prepare($conexion, $query);

// bind values 
$ok = mysqli_stmt_bind_param($resultado, "dii", $cantidad, $prodid, $id_usuario);

$ok = mysqli_stmt_execute($resultado);
 
// execute query
if($ok){
    // redirect and tell the user product was removed
    header('Location: ../vista/factura.php?action=quantity_updated&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: ../vista/factura.php?action=failed&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
?>