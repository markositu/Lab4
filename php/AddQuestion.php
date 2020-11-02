<!DOCTYPE html>
<html>
<head>
	<?php
  
        echo("<script>window.location.href='Show.php?email=usuario</script>");
?>

  <?php include '../html/Head.html'?>
</head>
    	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    	<script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
<body>
  <?php include '../php/Menus.php' ?>
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
			  ?>

    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
