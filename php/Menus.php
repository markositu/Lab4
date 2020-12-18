<?php
//if(!isset($_SESSION))      {          session_start();      }
?>
<div id='page-wrap'>
<header class='main' id='h1'>
	<?php if(!isset($_SESSION['email'])){
  echo"<span class='right'><a href='SignUp.php'>Registro</a></span>";
   echo"<span class='right'><a href='Login.php'>Login</a></span>";
	
   
}
   else{

      echo"  <span class='right'><a href='Logout.php'>Logout</a></span>";
      echo "<p>" .$_SESSION['email']."</p>";
      echo "<img src=".$_SESSION['foto']." width=\"50px\" height=\"50px\">" ;
   }
?>
</header>
<nav class='main' id='n1' role='navigation'>
<?php 
if (isset($_SESSION['email'])){

if($_SESSION['admin']=='SI'){
	echo "<span><a href='Layout.php'>Inicio</a></span>";
	echo" <span><a href='Credits.php'>Creditos</a></span>";
	echo" <span><a href='HandlingAccounts.php'>Gestionar cuentas</a></span>";
}
else{

 echo "<span><a href='Layout.php'>Inicio</a></span>";
 echo" <span><a href='Credits.php'>Creditos</a></span>";
 echo"<span><a href='ShowQuestions.php'>Ver Preguntas</a></span>";
echo"<span><a href='HandlingQuizesAjax.php'> Gestionar Preguntas</a></span>";

}}
else{
	 echo "<span><a href='Layout.php'>Inicio</a></span>";
 echo" <span><a href='Credits.php'>Creditos</a></span>";
	


}


?>
</nav>


