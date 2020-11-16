<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
	

  <?php include '../php/Menus.php' ?>

  <section class="main" id="s1">
    <div>
    	<script src="../js/jquery-3.4.1.min.js"></script>
		<script src="../js/ShowQuestionsAjax.js"></script>
		<script src="../js/AddQuestionsAjax.js"></script>
   		
   		
   		
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
			
		    <input type="button" value="Enviar" name="enviar" onclick="insertarPregunta()">
		    <input type="button" name ="verpreguntas" value="Ver Preguntas"  onclick="verPreguntas()">
		    <input type="button" value="Reset" onclick="reset()">
		    <div id="resultado"></div>
		   	<div id="mensajeexito"></div>
		    
		</form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
