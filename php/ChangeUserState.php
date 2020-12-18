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
$query1="SELECT Estado from usuarios where Email='" . $_GET['email']."'";
echo"$query1";
$usuarios=mysqli_query($mysql,$query1);
$row = mysqli_fetch_array($usuarios);
if ($row['Estado']==0)
{
  
  $query2="UPDATE usuarios SET Estado=1 WHERE Email='" . $_GET['email']."'";
  mysqli_query($mysql,$query2);
}
else
{
  
  $query2="UPDATE usuarios SET Estado=0 WHERE Email='" . $_GET['email']."'";
  mysqli_query($mysql,$query2);
}
mysqli_close( $mysql);
echo "<script>alert ('Estado cambiado')</script>";
echo "<script>window.location.href='HandlingAccounts.php'</script>";
?>