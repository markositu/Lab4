function contarpreguntas(usuario)
{
  $.ajax({
    url:'CountQuestions.php?email='+usuario,
    type:'GET',
    
    success:function(data){
      $('#contador').html(data);
    }
  });
   
 }