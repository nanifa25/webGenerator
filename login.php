<?php
session_start();
if (isset($_SESSION['email'])) {
	header("Location: panel.php");
}
if (isset($_GET['login'])) {
	$email=$_GET['email'];
	$pass=$_GET['pass'];
	if ($email=="admin@server.com" && $pass=="serveradmin") {
		$msj="Bienvenido";
		session_start();
		$_SESSION['email']="admin@server.com";
		$_SESSION['password']="serveradmin";
		header("Location: paneladmin.php");
	} else{
		include 'credenciales.php';
		$bd=mysqli_connect(HOST,USER,PASS,BD);
		$sql = "SELECT * FROM usuario";
		$resultado=mysqli_query($bd,$sql);
		if (mysqli_num_rows($resultado)>0) {
			while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
			if($fila['email']==$email && $fila['password']==$pass){
				$mensaje='Bienvenido';
				session_start();
				$_SESSION['idUsuario']=$fila['idUsuario'];
				$_SESSION['email']=$fila['idUsuario'];
				header("Location: panel.php");
			}else{
				$mensaje='Usuario/Contraseña incorrectas';
			}
		}
	}else{
		$mensaje='No existe este usuario';
	}
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CLASE_11</title>
</head>
<body>
	<H1>WebGenerator Matas Versolato Nicolas</H1>
	<form method="GET">
		<p>Email<input type="text" name="email" placeholder="Email"></input></p>
		<p>Contraseña<input type="text" name="pass" id=""></input></p>
		<input type="submit" value="Login" name="login">
	</form>
	<a href="register.php">Registrate aca</a>
</body>
</html>