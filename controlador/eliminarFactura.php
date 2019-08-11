º<?php
// connect to database
include '../modelo/conexion.php';
 
// get the product id
$prodid = isset($_GET['prodid']) ? $_GET['prodid'] : "";
$prodmarca = isset($_GET['prodmarca']) ? $_GET['prodmarca'] : "";
$id_usuario = 1;
$conexion = Conectarse();
 
// delete query
$query = "DELETE FROM factura WHERE id_producto=?";
 
// prepare query
$resultado = mysqli_prepare($conexion, $query);
 
// bind values
$ok = mysqli_stmt_bind_param($resultado, "i", $prodid);

$ok = mysqli_stmt_execute($resultado); 
// execute query
if($ok){
    // redirect and tell the user product was removed
    header('Location: ../vista/factura.php?action=removed&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
 
// if remove failed
else{
    // redirect and tell the user it failed
    header('Location: ../vista/factura.php?action=failed&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
?>