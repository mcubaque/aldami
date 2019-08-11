<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>footerFactura</title>
</head>
<body>
    
<!-- /container -->
 
<!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<!-- bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/holder.js"></script>
 
<script>
$(document).ready(function(){
    $('.add-to-fact').click(function(){
        var prodid = $(this).closest('tr').find('.prodid').text();
        var prodmarca = $(this).closest('tr').find('.prodmarca').text();
        var cantidad = $(this).closest('tr').find('input').val();
        window.location.href = "../controlador/agregarFactura.php?prodid=" + prodid + "&prodmarca=" + prodmarca + "&cantidad=" + cantidad;
    });

     $('.add-to-encabezado').click(function(){
        var prodid = $(this).closest('tr').find('.prodid').text();
        var prodmarca = $(this).closest('tr').find('.prodmarca').text();
        var cantidad = $(this).closest('tr').find('input').val();
        window.location.href = "../controlador/agregarFactura.php?prodid=" + prodid + "&prodmarca=" + prodmarca + "&cantidad=" + cantidad;
    });
     
    $('.update-quantity').click(function(){
        var prodid = $(this).closest('tr').find('.prodid').text();
        var prodmarca = $(this).closest('tr').find('.prodmarca').text();
        var cantidad = $(this).closest('tr').find('input').val();
        window.location.href = "../controlador/actualizarFactura.php?prodid=" + prodid + "&prodmarca=" + prodmarca + "&cantidad=" + cantidad;
    });
});
</script>
 
</body>
</html>