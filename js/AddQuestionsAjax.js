function insertarPregunta(){
        $.ajax({
            url: 'AddQuestion.php',
            type:'POST',
            data: $("#fquestion").serialize(),
            
            success: function(data){
                         $("#mensajeexito").fadeIn().html(data);
                     verPreguntas();
            },
            error: function (data) {
                $('#resultado').fadeIn().html('<p class="error"><strong>El servidor parece que no responde</p>');
            }
        });
        
    }
    function reset() {
        $('#pregunta').val('');
        $('#opcioncorrecta').val('');
        $('#opcionincorrecta1').val('');
        $('#opcionincorrecta2').val('');
        $('#opcionincorrecta3').val('');
        $('#tema').val('');
        
        

    }