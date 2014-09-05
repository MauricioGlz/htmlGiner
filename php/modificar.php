<?php

$mysql_host = "mysql.hostinger.co.uk";
$mysql_database = "u389974836_agend";
$mysql_user = "u389974836_toxa";
$mysql_password = "fearofthedark";

if( !( $driver = mysql_connect($mysql_host, $mysql_user, $mysql_password) ) )
{
	print("<!DOCTYPE html><html><head><title>Error</title></head><body><h2 style='color: red;'>No se pudo conectar a la base de datos</h2></body></html>");
	exit();
}

if( !mysql_select_db($mysql_database, $driver) )
{
	print("<!DOCTYPE html><html><head><title>Error</title></head><body><h2 style='color: red;'>No se pudo encontrar la base de datos</h2></body></html>");
	exit();
}

if(isset($_GET['i']))
{

	$email = $_GET['i'];
	$q = "SELECT * FROM Contactos WHERE Email = '$email'";
	$r = mysql_query($q, $driver);
	$val = mysql_fetch_array($r);

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar a <?php print($val["Nombre"]); ?></title>
		<link rel="stylesheet" type="text/css" href="../CSS/stylesheet.css">
	</head>
	<body>

	<div id="page">
	<h1>Modificar Contacto</h1>
	<hr />
		<form action="modificar.php" method="post">
			<table>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="Nombre" <?php print("value='" . $val["Nombre"] . "'"); ?>></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="Email" <?php print("value='" . $val["Email"] . "'"); ?>></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="Telefono" <?php print("value='" . $val["Telefono"] . "'"); ?>></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="Direccion" <?php print("value='" . $val["Direccion"] . "'"); ?>></td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td><input type="text" name="Ciudad" <?php print("value='" . $val["Ciudad"] . "'"); ?>></td>
				</tr>
			</table>
			<input type="hidden" name="old" <?php print("value='" . $val["Email"] . "'") ?>>
			<input type="submit" value="Actualizar">
		</form>
	</div>

	</body>
	</html>
	<?php
}
else
{
	$Nombre = $_POST['Nombre'];
	$Email = $_POST['Email'];
	$Telefono = $_POST['Telefono'];
	$Direccion = $_POST['Direccion'];
	$Ciudad = $_POST['Ciudad'];
	$old = $_POST['old'];

	$q = "UPDATE Contactos SET Nombre = '$Nombre', Email = '$Email', Telefono = $Telefono, Direccion = '$Direccion', Ciudad = '$Ciudad' WHERE Email = '$old'";

	if(!mysql_query($q))
	{
		print("<!DOCTYPE html><html><head><title>Error</title></head><body><h2 style='color: red;'>No se pudo actualizar la tabla</h2></body></html>");
		exit();
	}

	header("Location: ../tarea8.php");
	exit();
}
?>