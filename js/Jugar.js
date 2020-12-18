function obtenerPregunta(){
var e = document.getElementById("temas");
var t = e.options[e.selectedIndex].value;
$.ajax({type:'POST',
        data:{tema:t},
        url:'ObtenerPregunta.php',
        success:function(datos){
            $('#pregunta').html(datos);
            
        }
        });
}