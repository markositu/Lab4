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
