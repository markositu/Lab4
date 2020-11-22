xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
  	if(xmlhttp.responseText=='<h3 id="vip2" style="color: red;">La contraseña no es muy fuerte</h3>'||xmlhttp.responseText=='<h3 id="vip2" style="color: green;">La contraseña es segura</h3>'){
  		document.getElementById("resultuadoVerificacion2").innerHTML = xmlhttp.responseText;
  	}else{
      document.getElementById("resultuadoVerificacion").innerHTML = xmlhttp.responseText;
  }
      if($("#vip").text()=="El email no es válido"||$("#vip2").text()=="La contraseña no es muy fuerte" ){
      	$("#registrar").prop("disabled", true);
      	
      }
      else{
      	$("#registrar").prop("disabled", false);
      	
      }
    }
}
function verificarEmail(){
  xmlhttp.open("GET", "ClientVerifyEnrollment.php?email="+ $("#email").val());
  xmlhttp.send();
}

function verificarContrasena(){


  xmlhttp.open("GET", "ClientVerifyPassword.php?password="+ $("#password").val());
  xmlhttp.send();
}
