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
    if ($_SESSION["admin"]!="NO")
    {
        echo"<script> alert('Debes ser usuario para estar aquí');</script>";
         echo "<script> window.location.replace('Layout.php');</script>";
        exit();
    }
  }

$xml = simplexml_load_file('../xml/Questions.xml');
$numeroTotal=0;
$numeroUsuario=0;
foreach ($xml->assessmentItem as $item){

    if ($item["author"]==$_GET['email']){$numeroUsuario=$numeroUsuario+1;};
  $numeroTotal=$numeroTotal+1;
}
echo $numeroTotal . " / " . $numeroUsuario;
?>