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
	<form action="RecuperarContrasenaCodigo.php?emailRecuperacion=<?php if (isset($_GET['emailRecuperacion'])){echo $_GET['emailRecuperacion'];} ?>" method="post">
		<h2>Identificación de usuario </h2>
		<p> Codigo : <input type="number" required name="codigo" size="21" value="" />
		<p> Nueva Contraseña : <input type="password" required name="passrec" size="21" value="" />
		<p> Repetir Nueva Contraseña : <input type="password" required name="pass2" size="21" value="" />
		<p> <input type="submit" />
	</form>
	<?php
		if(isset($_POST['passrec'])){
		if($_SESSION['codigo']==$_POST['codigo']){
		    if($_POST['passrec']==$_POST['pass2'] && $_GET['emailRecuperacion']==$_SESSION['emailRecuperacion']){
		        $passrec=crypt($_POST['passrec'],'holiwi');
		        include "DbConfig.php";
				$mysql=mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
				$sql="UPDATE usuarios SET Password='".$passrec."' WHERE Email='".$_GET['emailRecuperacion']."'";
				if (mysqli_query($mysql,$sql))
                {
                	mysqli_close($mysql);
                    echo "Contraseña modificada con éxito.";
                   // session_destroy();
                }
                else
                {
                	
                	echo mysqli_error($mysql);
                	mysqli_close($mysql);
                    echo "Error al introducir información en la base de datos.";
                }
		    }
		    else{
		        echo"<h2>Las contraseñas no coinciden</h2>";
		        exit;
		    }
		}
		else{
		         echo"<h2>El código es incorrecto</h2>";
		        exit;
		}
		}
		
	?>	  
    </div>
  </section>
  <?php include '../html/Footer.html'?>
</body>
</html>
