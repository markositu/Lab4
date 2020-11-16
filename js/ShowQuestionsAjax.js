xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function(){
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
      document.getElementById("resultado").innerHTML = xmlhttp.responseText;
    }
}
function verPreguntas(){
  xmlhttp.open("GET", "ShowXMLQuestions.php");
  xmlhttp.send();
}
