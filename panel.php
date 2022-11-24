<?php
session_start();
shell_exec('rm -r css ');
shell_exec('rm -r img');
shell_exec('rm -r js');
shell_exec('rm -r php');
shell_exec('rm -r tpl');

if(!isset($_SESSION['email'])){
	header("Location: login.php");
}
if (isset($_POST['boton'])) {
	if ($_POST["dominio"]=="X|") {
		$msj1='Falta el dominio';
	}else{
		$dom=$_SESSION['idUsuario'].$_POST["dominio"];
		include 'credenciales.php';
		$bd = mysqli_connect(HOST,USER,PASS,BD);
		$sql="SELECT * FROM webs";
		$res = mysqli_query($bd, $sql);
		$creado=true;
		if (mysqli_num_rows($res)>0) {
			while($y=mysqli_fetch_array($res,MYSQLI_ASSOC))
			if ($y['dominio']==$dom) {
				$msj2='El dominio ya esta en uso';
				$creado=false;
			}
		}
	}
	if ($creado) {
		$dia=date("Y-m-d");
		$res='INSERT INTO webs (idUsuario,dominio,fechaCreacion) VALUES ("'.$_SESSION["idUsuario"].'","'. $dom.'", "'.$dia.'")';
			if(mysqli_query($bd,$res)){
				$msj2='Dominio registrado!';
				echo shell_exec('./wix.sh '.$dom);
			}else{
				$msj2="Error: No se pudo registrar";
			}
	}
}
	include_once 'credenciales.php';
		$bd = mysqli_connect(HOST,USER,PASS,BD);
		$resp = "SELECT * FROM webs";
		$resul = mysqli_query($bd,$resp);
		$listar="<table>";
		if(mysqli_num_rows($resul)>0){
			while($y=mysqli_fetch_array($resul,MYSQLI_ASSOC)){
				if($y['idUsuario']==$_SESSION['idUsuario']){
					$listar.='<tr><td><a href="'.$y["dominio"].'">'.$y["dominio"].'</a></td><td><a href="comprimidos.php?zip='.$y["dominio"].'">Descargar web</a></td><td><a href="delete.php?dominio='.$y["dominio"].'">Eliminar web</a></td></tr>';
				}
			}
		}

$listar.="</table>";
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
	<center>
		<h1>Este es el panel</h1>
		<a href="logout.php">Cerrar sesion</a>
		<label for="formulario"><h2>Generar Web de:</h2></label>
		<form method="POST" id="formulario">
			<input type="text" name="dominio" placeholder="Dominio de la Web" id="">
			<input type="submit" name="boton" value="Crear Web" id="">
		</form>
		<?php echo $listar; ?>
	</center>
</body>
</html>