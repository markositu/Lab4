<div id='page-wrap'>
<header class='main' id='h1'>
	<?php if(!isset($_GET['email'])){
  echo"<span class='right'><a href='SignUp.php'>Registro</a></span>";
   echo"<span class='right'><a href='Login.php'>Login</a></span>";
}
   else{
      echo"  <span class='right'><a href='Logout.php'>Logout</a></span>";
   }
?>
</header>
<nav class='main' id='n1' role='navigation'>
<?php if(isset($_GET['email'])){
 echo "<span><a href='Layout.php?email=usuario'>Inicio</a></span>";
 echo" <span><a href='Credits.php?email=usuario'>Creditos</a></span>";
 echo"<span><a href='ShowQuestions.php?email=usuario'>Ver Preguntas</a></span>";
echo"<span><a href='QuestionForm.php?email=usuario'> Insertar Pregunta</a></span>";
echo"<span><a href='HandlingQuizesAjax.php?email=usuario'> Gestionar Preguntas</a></span>";
echo"<span><a href='ShowXMLQuestions.php?email=usuario'> Ver Pregunta XML</a></span>";
}
else{
	 echo "<span><a href='Layout.php'>Inicio</a></span>";
 echo" <span><a href='Credits.php'>Creditos</a></span>";
	


}

?>
</nav>


