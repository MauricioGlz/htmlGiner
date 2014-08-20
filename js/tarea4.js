function calcularAreaTriangulo() {formTriangulo.resultado.value = (formTriangulo.base.value * formTriangulo.altura.value) / 2; }

function calcularAreaCuadrado() {formCuadrado.resultado.value = formCuadrado.base.value * formCuadrado.altura.value; }

function convertirTemperatura(farenheit)
{
	var celsius;/* Primer error, falta de punto y coma, en su lugar había una coma */
	var s = "";
	for( i =- 2; i <= 12; i++){ /* Segundo error, dos puntos en lugar de punto y coma */
		celsius = 10 * i;
		farenheit = 32 + (celsius * 9) /5;
		s = s + "C= " + celsius + "\nF = "+ farenheit + "\n";
		if (celsius == 0) s = s + "Punto congelacion del Agua\n";
		if (celsius == 100) s = s + "Punto de ebullicion del Agua\n";
	}
	alert(s);/* Tercer error, no se cierran los parentesis */
}

function cambiarImagen()
{
	var index = select.selectedIndex;
	imagen.src = "images/img" + index + ".jpg";
}

function changeWindow()
{
	openWindow();
	myWindow.resizeTo(windowForm.widthProperty.value, windowForm.heightProperty.value);
	myWindow.moveTo(windowForm.xProperty.value, windowForm.yProperty.value);
	myWindow.focus();
}

function openWindow()
{
	if(myWindow == null || myWindow.closed)
	{	
		myWindow = window.open("", "", windowForm.widthProperty.value, windowForm.heightProperty.value);
	}
}

var myWindow = null;