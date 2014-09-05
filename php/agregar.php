<?php
if( isset($_POST["Nombre"]) )
{
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

	$Nombre = $_POST['Nombre'];
	$Email = $_POST['Email'];
	$Telefono = $_POST['Telefono'];
	$Direccion = $_POST['Direccion'];
	$Ciudad = $_POST['Ciudad'];

	$q = "INSERT INTO Contactos (Nombre, Email, Telefono, Direccion, Ciudad) VALUES ('$Nombre', '$Email', $Telefono, '$Direccion', '$Ciudad');";
	if( mysql_query($q, $driver) )
	{
		header("Location: ../tarea8.php");
		exit();
	}
	else
	{
		print("<!DOCTYPE html><html><head><title>Error</title></head><body><h2 style='color: red;'>No se pudo agregar la fila</h2></body></html>");
	}
}
else
{
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
		<h1>Agregar contacto</h1>
		<hr />
		<form action="agregar.php" method="post">
			<table>
				<tr>
					<td>Nombre:</td>
					<td><input type="text" name="Nombre" ></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="Email" ></td>
				</tr>
				<tr>
					<td>Telefono</td>
					<td><input type="text" name="Telefono" ></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td><input type="text" name="Direccion"></td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td><input type="text" name="Ciudad"></td>
				</tr>
			</table>
			<input type="submit" value="Agregar">
		</form>
	</div>

	</body>
	</html>

	<?php
}
exit();
?>