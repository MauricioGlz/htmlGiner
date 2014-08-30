<html>
<head>
	<title>Actividad 1</title>
</head>
<body>

<?php

function actividad1($numero)
{
	/* Agregado del simbolo $ */
	$lista[] = 2;
	/* Agregar $, eliminación del int */
	for ($i = 3; $i <= $numero; $i++)
	{
		/* Punto y coma */
		$es = TRUE;
		foreach ($lista as $j)
		{
			/* Cambio de = por ==, agregado de parentesis, eliminación del then, agregado de llaves */
			if ($i % $j == 0)
			{
				$es = FALSE;
				break;
			}
		}
		if ($es)
			$lista[] = $i;
	}
	return $lista;
}

/* Punto y coma */
$resultado = actividad1(200);
foreach ($resultado as $r)
{
	echo "$r<br>";
}

/* Cierre de etiqueta php */
?>

</body>
</html>