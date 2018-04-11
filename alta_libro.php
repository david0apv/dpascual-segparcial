<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Registro de libros</title>
</head>
<body>
<?php
session_start();
$_SESSION['alta']=3;

if ($_SESSION['pag']==0){
	header("Location: login.php");
}

$_SESSION['pag']=0;

include 'conexion.php';
$conn = conectar();


$query = ("SELECT id_autor,nombre,apaterno FROM autores");

$process = pg_query($conn, $query);
?>

<div class="encabezado">
<h2>Registro de libros</h2>
</div>

<div class="contenido">
<form action="alta.php" method="post">
<p>Introduzca su nombre y apellidos</p>
Titulo: <input type="text" name="titulo" required><br><br>
Autor: <select name="autor" required>
<?php
	while ($row = pg_fetch_row($process)) {
	  echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
	}
?>
</select><br><br>
Año de publicación: <input type="number" min="0000" max="2099" step="1" value="2018" name="anyo" required><br><br>
<input type="submit" value="Enviar">
</form>
</div>

<div class="pie">
	<a href="creditos.php">Ver creditos y cerrar sesion</a>
</div>
</body>
</html>
