<!DOCTYPE HTML>
<html>
<head>
<title>Alta Registro</title>
</head>
<body>
<?php
//Incluir archivo php de conexiòn
include 'conexion.php';

//Asignar funcion de conectar a una variable para conectar a la bd
$conn = conectar();

//Declaraciòn de variable para control de errores con los formularios
$err = 0;

session_start();

if ($_SESSION['pag']==0){
	header("Location: login.php");
}

//Alta usuarios
if ($_SESSION['alta']==1){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$usuario = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
	if ($_POST['pass']){
		$pass = md5($_POST['pass']);	
	}
	else {
		$pass = "";
		$err = 1;
	}

	if ($nombre) {
		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
			$err = 1;
		}
	} else{
		$err = 1;
	}

	if ($apaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$err = 1;
		}
	} else{
		$err = 1;
	}
	if ($amaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$err = 1;
		}
	}
	if (!$usuario) {
			$err = 1;
	}
	if (!$pass) {
			$err = 1;
	}

	//Insertar datos a db si no hubo errores en caso contrario indicar el error
	if ($err == 0) {
		//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
		$query = ("INSERT INTO usuarios (nombre,apaterno,amaterno,usuario,contraseña) VALUES ('$nombre','$apaterno','$amaterno','$usuario','$pass')");
		//Ejecutar query llamando la variable de conexiòn a la bd
		$process = pg_query($conn, $query);
		//Informar si la query se ejecuto o no
		if  (!$process) {
		   $_SESSION['bd']=1;
		}
		else {
		   $_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;

	}
	//Cerrar la conexion a la bd
	pg_close($conn);
	$_SESSION['pag']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");

}
//Alta autores
else if ($_SESSION['alta']==2){
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$apaterno = filter_var($_POST['apaterno'], FILTER_SANITIZE_STRING);
	$amaterno = filter_var($_POST['amaterno'], FILTER_SANITIZE_STRING);
	$nacionalidad = filter_var($_POST['nacionalidad'], FILTER_SANITIZE_STRING);

	if ($nombre) {
		if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$nombre)){
			$err = 1;
		}
	} else{
		$err = 1;
	}

	if ($apaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$err = 1;
		}
	} else{
		$err = 1;
	}
	if ($amaterno) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$amaterno)) {
			$err = 1;
		}
	}
	if ($nacionalidad) {
		if (!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$apaterno)) {
			$err = 1;
		}
	} else{
		$err = 1;
	}

	//Insertar datos a db si no hubo errores en caso contrario indicar el error
	if ($err == 0) {
		//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
		$query = ("INSERT INTO autores (nombre,apaterno,amaterno,nacionalidad) VALUES ('$nombre','$apaterno','$amaterno','$nacionalidad')");
		//Ejecutar query llamando la variable de conexiòn a la bd
		$process = pg_query($conn, $query);
		//Informar si la query se ejecuto o no
		if  (!$process) {
		   $_SESSION['bd']=1;
		}
		else {
		   $_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;

	}
	//Cerrar la conexion a la bd
	pg_close($conn);
	$_SESSION['pag']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");
} 
//Alta libros
else if ($_SESSION['alta']==3){
	$titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
	$autor = $_POST['autor'];
	$anyo = $_POST['anyo'];

	if(!preg_match('/^()[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ]+(\s[A-ZÁÉÍÓÚÜÑ]?[a-záéíóúüñ]+)*$/',$titulo)){
			echo "Error: Titulo invalido<br>";
			$err = 1;
	}

	//Insertar datos a db si no hubo errores en caso contrario indicar el error
	if ($err == 0) {
		//Asignar query a variable (se agrego user_name y password para no romper la funcionalidad con los cambios en la bd)
		$query = ("INSERT INTO libros (titulo,id_autor,año) VALUES ('$titulo','$autor','$anyo')");
		//Ejecutar query llamando la variable de conexiòn a la bd
		$process = pg_query($conn, $query);
		//Informar si la query se ejecuto o no
		if  (!$process) {
		   $_SESSION['bd']=1;
		}
		else {
		   $_SESSION['bd']=2;
		}
	} else{
		$_SESSION['bd']=1;

	}
	//Cerrar la conexion a la bd
	pg_close($conn);
	$_SESSION['pag']=1;
	$_SESSION['alta']=0;
	header("Location: menu.php");
}
//Llega externo
else if ($_SESSION['alta']==0){
	$_SESSION['pag']=0;
	header("Location: login.php");
}
?>
</body>
</html>
