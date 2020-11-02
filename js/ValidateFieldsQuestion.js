function validar_email(email){
	//alert(email)
	var expalumno = /^([A-Za-z]+[0-9][0-9][0-9]@ikasle\.ehu\.e(u)?s)$/;
	var expprofe = /^([A-Za-z]+@ehu\.e(u)?s)$/;
	var expprofeconpunto = /^([A-Za-z]+\.[A-Za-z]+@ehu\.e(u)?s)$/;

	if (expalumno.test(email)){
		return true;
	}
	if (expprofe.test(email)){
		return true;
	}
	if (expprofeconpunto.test(email)){
		return true;
	}
	alert("Email incorrecto");
	return false;
}
function validar_complejidad(complejidad){
	
	if (complejidad == 1 || complejidad == 2 || complejidad == 3){
		return true;
	}else{
		alert("complejidad no funciona");
		return false;
	}
}
function validar_pregunta(pregunta){
	if(pregunta.length>=10){
		return true;
	}else{
		alert("Pregunta demasiado corta");
		return false;
	}
}
function validate(){
	var email = $("#email").val();
	var complejidad = $("#complejidad").val();
	var pregunta = $("#pregunta").val();
	var opcioncorrecta = $("#opcioncorrecta").val();
	var opcionincorrecta1 = $("#opcionincorrecta1").val();
	var opcionincorrecta2 = $("#opcionincorrecta2").val();
	var opcionincorrecta3 = $("#opcionincorrecta3").val();
	var tema = $("#tema").val();
	if(email == "" || complejidad == ""
		|| pregunta == ""|| opcioncorrecta == ""
		|| opcionincorrecta1 == "" || opcionincorrecta2 == "" ||
		opcionincorrecta3 == "" || tema == ""){
		alert("Campos obligatorios vacíos.");
		return false;
	}
	if(!validar_email(email)){
		return false;
	}
	if(!validar_complejidad(parseInt(complejidad))){
		return false;
	}
	if(!validar_pregunta(pregunta)){
		return false;
	}
	return true
}