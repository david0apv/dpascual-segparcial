<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Registro de autor</title>
</head>
<body>
<?php
session_start();

if ($_SESSION['pag']==0){
	header("Location: login.php");
}

$_SESSION['pag']=0;

$_SESSION['alta']=2;
?>
<div class="encabezado">
<h2>Registro de autor</h2>
</div>

<div class="contenido">
<form action="alta.php" method="post">
<p>Introduzca su nombre y apellidos</p>
Nombre: <input type="text" name="nombre" required><br><br>
Apellido paterno: <input type="text" name="apaterno" required><br><br>
Apellido materno: <input type="text" name="amaterno"><br><br>
Nacionalidad: <input type="text" name="nacionalidad" required><br><br>
<input type="submit" value="Enviar">
</form>
</div>

<div class="pie">
	<a href="creditos.php">Ver creditos y cerrar sesion</a>
</div>
</body>
</html>
