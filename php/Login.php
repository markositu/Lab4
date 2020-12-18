<?php

if (isset($_POST['email'])){
include "DbConfig.php";
$mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());
$username=$_POST['email'];
$pass=crypt($_POST['pass'],'holiwi');
$usuarios = mysqli_query( $mysql,"select * from usuarios where Email ='$username' and Password ='$pass' and Estado=0");
$cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
mysqli_close( $mysql); //cierra la conexion
if($cont==1){
ini_set('session.cookie_lifetime','900');
session_start();
if($username=="admin@ehu.es"){
	$_SESSION["admin"]="SI";
	}
else{$_SESSION["admin"]="NO";}
$_SESSION["email"]= $username;
$row = mysqli_fetch_array($usuarios);
$foto=$row['Url'];
$_SESSION['foto']=$foto;

echo("<script>window.location.href='Layout.php?email=$username</script>");
echo "<script> window.location.replace('Layout.php')</script>";




} else {echo
("Par&aacute;metros de login incorrectos ");}
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    	<form action="Login.php" method="post">
<h2>Identificación de usuario </h2>
<p> Email : <input type="email" required name="email" size="21" value="" />
<p> Password: <input type="password" required name="pass" size="21" value="" />
<p><a href='RecuperarContrasena.php'>¿Olvidaste tu contraseña?</a></p>
<p> <input id="input_2" type="submit" />
</form>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>