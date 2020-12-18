<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	<h2>Recuperar Contraseña</h2>
	<form action="RecuperarContrasena.php" method="post">
		<h2>Identificación de usuario </h2>
		<p> Email : <input type="email" required name="emailRecuperacion" size="21" value="" />
		<p> <input type="submit" />
	</form>
	<?php
		if(isset($_POST['emailRecuperacion'])){
			$emailRecuperacion=$_POST['emailRecuperacion'];
			$_SESSION['codigo']=rand(100000,999999);
			$_SESSION['emailRecuperacion']=$emailRecuperacion;
			$mensaje="
			
			<html>
			<head>
				<title>Recuperar Contraseña</title>
			</head>
			<body>
				Link= <a href='https://marcositurbe.000webhostapp.com/SW20G11/php/RecuperarContrasenaCodigo.php?emailRecuperacion=".$emailRecuperacion."'>Link </a>
				Codigo=".$_SESSION['codigo']." 
			</body>
			</html>
			" ;
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$cabeceras .= 'From: Quizzes <info@address.com>' . "\r\n";
			mail($emailRecuperacion,"Recuperar Contrasena",$mensaje,$cabeceras);
			echo "<h2>Ya te hemos enviado el email de recuperación.</h2>";
			
		}
	?>	  
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
