<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
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
		    Email: <input type="text" id="email" name="email"><br>
		    Nombre y Apellidos : <input type="text" id="nombre" name="nombre"><br>
		    Contraseña <input type="password" id="contraseña"name ="contraseña"><br>
		    Repetir Contraseña <input type="password" id="contraseña2"name ="contraseña2"><br>
		   
		    <input type="submit" value="Enviar">
		    
		</form>
		<?php

if (isset($_POST['email'])){
include "DbConfig.php";
$mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());
$username=$_POST['email'];
$pass=$_POST['contraseña'];
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
}
?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>