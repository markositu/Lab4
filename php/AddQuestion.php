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
	<?php
  
        echo("<script>window.location.href='Show.php?email=usuario</script>");
?>

</head>
    	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    	<script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
<body>
  <section class="main" id="s1">
    <div>

			<?php
				
				$email=$_POST['email'];
				$enunciado=$_POST['pregunta'];
				$correcta=$_POST['opcioncorrecta'];
				$incorrecta1=$_POST['opcionincorrecta1'];
				$incorrecta2=$_POST['opcionincorrecta2'];
				$incorrecta3=$_POST['opcionincorrecta3'];
				$complejidad=$_POST['complejidad'];
				$tema=$_POST['tema'];
				if($email == "" || $complejidad == ""
					|| $enunciado == ""|| $incorrecta1 == ""
					|| $incorrecta2 == "" || $incorrecta3 == "" ||
					$correcta == "" || $tema == ""){
					echo ("<h2>ERROR algún campo está vacío <h2>");
					exit;
				}
				 if(!preg_match("/^([A-Za-z]+[0-9][0-9][0-9]@ikasle\.ehu\.e(u)?s)$/",$email)and(!preg_match("/^([A-Za-z]+@ehu\.e(u)?s)$/",$email))and(!preg_match("/^([A-Za-z]+\.[A-Za-z]+@ehu\.e(u)?s)$/",$email))){
				        echo ("<h2>ERROR email no válidod  <h2>");
				        exit;
			    }

				include "DbConfig.php";
				$mysql=mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
				$sql="INSERT INTO preguntas (Email,Enunciado,Correcta,Incorrecta1,Incorrecta2,Incorrecta3,Complejidad,Tema) ";
				$sql=$sql ."VALUES ('$email','$enunciado','$correcta','$incorrecta1','$incorrecta2','$incorrecta3',$complejidad,'$tema')";
				if (mysqli_query($mysql,$sql))
                {
                	mysqli_close($mysql);
                    echo "Pregunta Guardada en la BD";
                }
                else
                {
                	mysqli_close($mysql);
                    echo "Error al introducir información en la base de datos.";
                }
                $xml=simplexml_load_file('../xml/Questions.xml');
                $question=$xml->addChild('assessmentItem');
                $question->addAttribute('author',$email);
                $question->addAttribute('subject',$tema);
                $answer=$question->addChild('correctResponse');
                $answer->addChild('response',$correcta);
                $wrongAnswers=$question->addChild('incorrectResponses');
                $wrongAnswers->addChild('response',$incorrecta1);
                $wrongAnswers->addChild('response',$incorrecta2);
                $wrongAnswers->addChild('response',$incorrecta3);
                $questionText=$question->addChild('itemBody');
                $questionText->addChild('p',$enunciado);
                $xml->asXML('../xml/Questions.xml');

			  ?>

    </div>
  </section>
 
</body>
</html>
