<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Opciones de alta</title>
</head>
<body>
<div class="encabezado">
<h2>Opciones de alta</h2>
</div>

<div class="contenido">
<?php
session_start();
if ($_SESSION['pag']==1) {
	if ($_SESSION['bd']==1){
		?><font color="red">No se pudo realizar el registro<br><br></font><?php
		$_SESSION['bd']=0;
	}
	else if ($_SESSION['bd']==2){
		?><font color="green">El registro se ha realizado exitosamente<br><br></font><?php
		$_SESSION['bd']=0;
	}
	?>
	<a href="alta_usuario.php">Alta de usuarios</a><br><br>
	<a href="alta_autor.php">Alta de autores</a><br><br>
	<a href="alta_libro.php">Alta de libros</a><br><br>
	</div>
	
	<div class="pie">
		<a href="creditos.php">Ver creditos y cerrar sesion</a>
	</div>
	<?php
}
else{
	header("Location: login.php");
}
?>
</body>
</html>