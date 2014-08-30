<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
	<title>Lorem Ipsum</title>
</head>
<body>

<?php

$myfile = fopen("../raw/Lorem Ipsum.txt", "r") or die("No se pudo abrir el archivo");
echo fread($myfile, filesize("../raw/Lorem Ipsum.txt"));
fclose($myfile);

?>

</body>
</html>