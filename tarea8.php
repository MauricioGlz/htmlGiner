<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bases de datos en PHP</title>
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
</head>
<body>

<div id="page">

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


	?>

	<h1>Contactos</h1>
	<hr />
	<table border="1">
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Telefono</th>
			<th>Dirección</th>
			<th>Ciudad</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>

		<?php

		$q = "SELECT * from Contactos";
		$r = mysql_query($q, $driver);

		while( $reg = mysql_fetch_array($r) )
		{
			print("<tr>");
			print("<td>" . $reg["Nombre"]    . "</td>");
			print("<td>" . $reg["Email"]     . "</td>");
			print("<td>" . $reg["Telefono"]  . "</td>");
			print("<td>" . $reg["Direccion"] . "</td>");
			print("<td>" . $reg["Ciudad"]    . "</td>");
			print("<td><a href='php/modificar.php?i=" . $reg["Email"] . "'>Modificar</a></td>");
			print("<td><a href='php/eliminar.php?i=" . $reg["Email"] . "'>Eliminar</a></td>");
			print("</tr>");
		}

		mysql_close($driver);

		?>

	</table>
	<br />
	<form action="php/agregar.php"><input type="submit" value="Agregar"></form>
</div>

</body>
</html><?php exit(); ?>