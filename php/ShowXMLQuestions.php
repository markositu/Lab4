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
  
</head>
<body>
  
  
    <div>

      <?php
      $xml=simplexml_load_file('../xml/Questions.xml');
      echo '<table border=1> <tr><th>EMAIL</th><th>PREGUNTA</th><th>CORRECTA</th></tr>';
      	foreach($xml->assessmentItem as $pregunta){
      	$email=$pregunta['author'];
      	$answer=$pregunta->correctResponse->response;
    	$questionText=$pregunta->itemBody->p;
    	echo '<tr><td>'.$email.'</td><td>'.$questionText.'</td><td>'.$answer.'</td></tr>';
    }
	echo'</table>';
      ?>	
      
    </div>
  
  
</body>
</html>

