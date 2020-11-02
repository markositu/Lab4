<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
 
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
    	<?php
    		include "DbConfig.php";
    		$mysql=mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
    		$preguntas = mysqli_query($mysql,"select * from preguntas" ); 
    		echo '<table border=1> <tr><th>EMAIL</th><th>PREGUNTA</th><th>CORRECTA</th><th>INCORRECTA1</th><th>INCORRECTA2</th><th>INCORRECTA3</th><th>COMPLEJIDAD</th><th>TEMA</th></tr>';
    		

    		while( $row = mysqli_fetch_array($preguntas) ) {
        echo '<tr><td>' . $row['Email'] . '</td> <td>' . $row['Enunciado'] .'</td> <td>' . $row['Correcta'] . '</td><td>' . $row['Incorrecta1'] . '</td><td>' . $row['Incorrecta2'] . '</td><td>' . $row['Incorrecta3'] . '</td><td>' . $row['Complejidad'] . '</td><td>' . $row['Tema']  . '</td></tr>';
       }
       echo '</table>';
    	?>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
