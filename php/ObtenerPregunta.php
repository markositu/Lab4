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
    if ($_SESSION["admin"]!="NO")
    {
        echo"<script> alert('Debes ser usuario para estar aquí');</script>";
         echo "<script> window.location.replace('Layout.php');</script>";
        exit();
    }
  }
  if(isset($_POST['tema'])){
    $tema=$_POST['tema'];

                include "DbConfig.php";
    		    $mysql=mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
    	    	$preguntas = mysqli_fetch_row(mysqli_query($mysql,"SELECT * FROM preguntas Where Tema='$tema' " )); 
    	    	$_SESSION['preguntas']=$preguntas;
    			$i=rand(0,count($_SESSION['preguntas']));
    			echo count($_SESSION['preguntas']);
    			echo $preguntas[$i];
    			echo $i;
    			unset($_SESSION['preguntas'][$i]);
    			mysqli_close($mysql);
  }
  else{
      
  }
  
  ?>