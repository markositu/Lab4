<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
	<?php
  
        echo("<script>window.location.href='Show.php?email=usuario</script>");
?>

  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
    	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    	<script type="text/javascript" src="../js/ValidateFieldsQuestion.js"></script>
		<form name='fquestion' id="fquestion" action="AddQuestion.php?email=usuario" method="post" >
		    Email: <input type="text" id="email" name="email"><br>
		    Pregunta: <input type="text" id="pregunta" name="pregunta"><br>
		    Opción Correcta: <input type="text" id="opcioncorrecta" name="opcioncorrecta"><br>
		    Opción Incorrecta 1: <input type="text" id="opcionincorrecta1"name ="opcionincorrecta1"><br>
		    Opción Incorrecta 2: <input type="text" id="opcionincorrecta2"name ="opcionincorrecta2"><br>
		    Opción Incorrecta 3: <input type="text" id="opcionincorrecta3"name ="opcionincorrecta3"><br>
		    Complejidad:
		    <select id="complejidad" name="complejidad">
			    <option id="baja" value=1>Baja</option>
			    <option id="media" value=2>Media</option>
			    <option id="alta" value=3>Alta</option>
			</select><br>
			Tema: <input type="text" id="tema" name="tema"><br>
		    <input type="submit" value="Enviar">
		    
		</form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
