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
  ?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/Jugar.js"></script>
</head>
<body>
 
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
     <h1>Selecciona un tema</h1>
     <div>
         <form>
             <select id='temas' onchange='obtenerPregunta();'>
                <?php 
                include "DbConfig.php";
    		    $mysql=mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
    	    	$temas = mysqli_query($mysql,"select distinct Tema from preguntas" ); 
    			while( $row = mysqli_fetch_array($temas) ) {
                    echo '<option>' . $row['Tema'] .'</option> ';
    			    
    			}
    			mysqli_close($mysql);
                 ?>
            </select>
            <div id='pregunta'></div>
         </form>
     </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
