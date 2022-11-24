<?php
if(!isset($_SESSION['email'])){
	header("Location: login.php");
}else if($_SESSION['email']!="admin@server.com"){
	header("Location: login.php");
}
include 'credenciales.php';
$bd = mysqli_connect(HOST,USER,PASS,BD);
$sql = 'SELECT * FROM webs';
$res = mysql_query($bd,$sql);
$lis = "<table>";
if(mysqli_num_rows($res)>0){
	while ($n=mysqli_fetch_array($res,MYSQLI_ASSOC)){
		$lis='<tr><td><a href="../'.$f["dominio"].'">'.$f["dominio"].'</a></td></tr>';
	}
}else{
	$listar='No hay dominios registrados';
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
	<h1>Bienvenido Admin</h1>
	<a href="logout.php">Cerrar Sesion</a>
	<?php echo $lis ?>
</body>
</html>