<?php 
//header("Content-type: image/gif"); 
session_start();
extract ($_REQUEST);
if (!isset($_SESSION['user']))
  header("location:../index.php");//significa que no han iniciado sesión

if(isset($_GET['id'])){ 
    $id = $_GET['id']; 


	require "../Modelo/conexion.php";
    require "../Modelo/productos.php";
    $objProducto=new Productos();
    $resultado=$objProducto->consultarIdProducto(); 

    if($filas=$resultado->fetch_assoc()){
    	$imagen=$filas['imagen'];
    }

    echo $imagen;



     
   
     
   
    } 
?>