<?php
// connect to database
include '../modelo/conexion.php';
 
// product details
$prodid = isset($_GET['prodid']) ?  $_GET['prodid'] : die;
$prodmarca = isset($_GET['prodmarca']) ?  $_GET['prodmarca'] : die;
$cantidad  = isset($_GET['cantidad']) ?  $_GET['cantidad'] : die;
$id_usuario=1;
$creado=date('Y-m-d H:i:s');
$conexion = Conectarse();
 
// insert query
$query = "INSERT INTO cart_items (id_producto, cantidad, id_usuario, creado) VALUES (?,?,?,?)";
 
// prepare query
$resultado = mysqli_prepare($conexion, $query);

$ok = mysqli_stmt_bind_param($resultado, "idis", $prodid, $cantidad, $id_usuario, $creado);

$ok = mysqli_stmt_execute($resultado);
 
 
// if database insert succeeded
if($ok){
    header('Location: ../vista/comprar.php?action=added&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
 
// if database insert failed
else{
     header('Location: ../vista/comprar.php?action=failed&prodid=' . $prodid . '&prodmarca=' . $prodmarca);
}
 