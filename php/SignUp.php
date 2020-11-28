<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/VerifyEmailAjax.js"></script>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
		<form name='fquestion' id="fquestion" action="SignUp.php" method="post" >
			Tipo Usuario:
		    <select id="tipo" name="tipo">
			    <option id="profesor" value=1>profesor</option>
			    <option id="alumno" value=2>alumno</option>
			</select><br>
		    Email: <input type="text" id="email" name="email" onchange="verificarEmail()"><br>
		    <p id="resultuadoVerificacion" name="resultuadoVerificacion"> </p>
		    Nombre y Apellidos : <input type="text" id="nombre" name="nombre"><br>
		    Contraseña <input type="password" id="password"name ="password" onchange="verificarContrasena()"><br>
		    <p id="resultuadoVerificacion2" name="resultuadoVerificacion2"> </p>
		    Repetir Contraseña <input type="password" id="contraseña2"name ="contraseña2"><br>
		   
		    <input id="registrar" name="registrar" type="submit" value="Enviar">
		    
		</form>
		<?php

if (isset($_POST['email'])){
include "DbConfig.php";
$mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());
$username=$_POST['email'];
$pass=$_POST['password'];
$pass2=$_POST['contraseña2'];
$tipo=$_POST['tipo'];
$nombre=$_POST['nombre'];
if($pass!=$pass2){
	echo "<h2>las contraseñas no coinciden</h2>";
	exit;
}
if(strlen($pass)<6){
	echo "<h2>la contraseña debe tener al menos 6 caracteres</h2>";
	exit;
}

mysqli_query( $mysql,"INSERT INTO usuarios (TipoUsuario,Email,NombreApellidos,Password) VALUES ('$tipo','$username','$nombre','$pass')");

mysqli_close( $mysql); //cierra la conexion
echo "<h2>El usuario ".$username." se ha registrado con éxito.</h2>";
}
?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>