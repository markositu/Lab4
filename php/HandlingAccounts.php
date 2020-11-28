<?php
if(!isset($_SESSION))      {          session_start();      }
if (!isset($_SESSION["email"]))
{
	echo"<script> alert('Debes estar logueado para estar aquí');</script>";
  		 echo "<script> window.location.replace('Layout.php');</script>";
		exit();
}
else
{
	if ($_SESSION["admin"]!="SI")
	{
  		echo"<script> alert('Debes ser admin para estar aquí');</script>";
  		 echo "<script> window.location.replace('Layout.php');</script>";
		exit();
  	}
  }
?>
<html>
<head>
<?php
  include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
 <?php
$email=$_SESSION['email'];
include "DbConfig.php";
$mysql = mysqli_connect($server,$user,$pass,$basededatos) or die("Error de conexión a la BD");
$query = mysqli_query($mysql,"select * from usuarios" );
echo '<table border=1 > <tr> <th> EMAIL </th> <th> PASS </th><th> ESTADO </th><th> BLOQUEO </th><th> BORRAR </th></tr>';
while( $row = mysqli_fetch_array( $query ) ) {
 $email=$row['Email'];
 echo '<tr><td>' . $row['Email'] . '</td> <td>' . $row['Password'] . '</td><td>'.$row['Estado'].'</td>';
 echo '<td><button onClick=cambiarEstado("'.$email.'") > Cambiar Estado</button></td>';
 echo '<td><button onClick=borrar("'.$email.'")>Borrar</button></td></tr>';
 }
 echo '</table>';
 mysqli_close( $mysql);
?>
<script>
function cambiarEstado(email){
    if (confirm("Cambiar estado?")){location.href='ChangeUserState.php?email=' + email;}
}
function borrar(email){
    if (confirm("Quiere borrar para siempre este usuario?")){location.href='RemoveUser.php?email=' + email;}
}
</script>

</div>
</section>
</body>
</html>