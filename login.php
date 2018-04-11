<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Inicio</title>
</head>
<body>
<div class="encabezado">
	<h3>Iniciar sesión</h3>
</div>

<div class="contenido">
<?php
//Se reinicia la sesión para evitar acceso no autorizado
session_start();
$_SESSION['pag']=0;
//Se revisa si no hubo un error en el usuario y contraseña anteriormente o la consulta a la bd
if ($_SESSION['error']==1){
	?><font color="red">Usuario y/o contraseña incorrectos</font><?php
	$_SESSION['error']=0;
}
else if ($_SESSION['error']==2){
	?><font color="red">Hubo un error al acceder a la base de datos</font><?php
}
?>
<form action="autenticar.php" method="post">
	<h4>Introduzca su información de registro</h4>
	Usuario: <input type="text" name="usuario" autocomplete="off"><br><br>
	Contraseña: <input type="password" name="contrasenya" autocomplete="off"><br><br>
	<input type="submit" value="Ingresar">
</form>
</div>

<div class="pie">
	<a href="creditos.php">Ver creditos</a>
</div>
</body>
</html>