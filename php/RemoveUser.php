<?php
session_start();
if (!isset($_SESSION["email"]))
{
	echo"<script> alert('Debes estar logueado para estar aquí');</script>";
  		 echo "<script> window.location.replace('Layout.php');</script>";
		exit();
}
else
{
	if ($_SESSION["admin"]!="SI")
	{
  		echo"<script> alert('Debes ser admin para estar aquí');</script>";
  		 echo "<script> window.location.replace('Layout.php');</script>";
		exit();
  	}
  }

$email=$_SESSION['email'];
include "DbConfig.php";
$mysql = mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
$query="DELETE FROM Usuarios WHERE Email='" . $_GET['email']."'";

mysqli_query($mysql,$query);
echo "<script>alert ('usuario borrado')</script>";
echo "<script>window.location.href='HandlingAccounts.php'</script>";
mysqli_close( $mysql);
?>