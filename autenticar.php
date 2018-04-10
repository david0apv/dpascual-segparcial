<!DOCTYPE HTML>
<html>
<head>
<title>Autenticar</title>
</head>
<body>
<?php
//Incluir archivo php de conexiòn
include 'conexion.php';

//Asignar funcion de conectar a una variable para conectar a la bd
$conn = conectar();

//Sanitizar los formularios (quitar caracteres especiales o no pertenecientes al tipo de campo)
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$pass = md5($_POST['contrasenya']);

//Imprimir datos ingresados
echo "<h2>Datos</h2>Usuario: ".$usuario;
echo "<br>Contraseña: ".$pass;

//Asignar query a variable
$query = ("SELECT contraseña FROM usuarios WHERE usuario = '$usuario'");

//Ejecutar query llamando la variable de conexiòn a la bd
$process = pg_query($conn, $query);
//Informar si la query se ejecuto o no
if  (!$process) {
	$_SESSION['error']=2;
	header("Location: login.php");
}
else {
	//Si funciono la query comparar la contraseña
	$result = pg_fetch_result($process, 0, 0);
	if ($result == $pass){
		//Si la contraseña es correcta redirigir a menu de lo contrario a inicio
		session_start();
		$_SESSION['pag']=1;
		header("Location: menu.php");
	}
	else {
		session_start();
		$_SESSION['error']=1;
		header("Location: login.php");
	}
}

//Cerrar la conexion a la bd
pg_close($conn);
?>
</body>
</html>