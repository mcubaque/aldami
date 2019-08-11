<?php 
//session_start();
//extract ($_REQUEST);

//include "navbar.php";
include "encabezadoIndex.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="web aldami">
    <meta name="author" content="Aldami">
    <title>Index Aldami</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="css/shop-homepage.css" rel="stylesheet">
  
</head>
<body>



<div class="container ">
    <div class="article  ">
     <h2 class="jumbotron-fluid mt-3 text-center">REGISTRO</h2>
     	<section class="section justify-content-center">
          <article class="justify-content-center">
      <div class="row align-content-center">
      
  
          <div class="col-md-6">
       <form action="../controlador/agregarClientes.php"  method="POST" class="form ">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="email" name="clieemail" aria-describedby="emailHelp" placeholder="Su email" required="required">
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con nadie mas.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="password" name="cliepass" placeholder="Su Password" required="required">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Documento de identidad</label>
        <input type="text" class="form-control" id="documento" name="clienumerodoc" placeholder="Su No. de documento" required="required" pattern="[0-9]+">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Nombre</label>
        <input type="text" class="form-control" id="clienombre" name="clienombre" placeholder="Su nombre" required="required" pattern="[a-zA-Z]+">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="clieapellido" placeholder="Su apellido" required="required" pattern="[a-zA-Z]+">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="cliedireccion"  placeholder="Su direccion de domicilio">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Fecha de nacimiento</label>
        <input type="text" class="form-control" id="nacimiento" name="cliefechanacimiento" placeholder="Su fecha de nacimiento">
      </div>
      <div class="form-group">
        <div class="form-group">
        <label for="exampleInputPassword1">Ciudad</label>
        <input type="text" class="form-control" id="ciduad" name="ciudad" placeholder="Su ciudad" pattern="[a-zA-Z]+">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input type="hidden" class="form-control" id="usuariocliente" name="tipo_usuario" value="cliente"  >
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
        <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones</label>
      </div>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
    
     </div>  
</div>


          </article>
        </section>
        
 
    <!-- /section-->

<?php 

//include "footerTienda.php";
 ?>
