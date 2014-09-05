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

$email = $_GET['i'];
$q = "DELETE FROM Contactos WHERE Email = '$email'";

if( mysql_query($q, $driver) )
{
	header("Location: ../tarea8.php");
	exit();
}

echo "<h2>No se pudo eliminar</h2>";
exit();
?>