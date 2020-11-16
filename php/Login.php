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
<p> <input id="input_2" type="submit" />
</form>
<?php

if (isset($_POST['email'])){
include "DbConfig.php";
$mysql= mysqli_connect($server,$user,$pass,$basededatos) or die(mysqli_connect_error());
$username=$_POST['email'];
$pass=$_POST['pass'];
$usuarios = mysqli_query( $mysql,"select * from usuarios where Email ='$username' and Password ='$pass'");
$cont= mysqli_num_rows($usuarios); //Se verifica el total de filas devueltas
mysqli_close( $mysql); //cierra la conexion
if($cont==1){echo("<script>window.location.href='Layout.php?email=$username</script>");
echo "<script> window.location.replace('https://marcositurbe.000webhostapp.com/SW20G11/php/Layout.php?email=$username')</script>";
echo ("Login correcto<p>Puede insertar preguntas</a>");} else {echo
("Par&aacute;metros de login incorrectos ");}
}
?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>