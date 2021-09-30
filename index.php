<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <title>Sistema de sorteio</title>
</head>
<body>

    <h1>Sistema de sorteio</h1>
    <div class="entrada">
        <?php
            for($numeros = 1;$numeros <= 100; $numeros++){
              echo  '<input class="numero" type="button" name="v" value="'.$numeros.'">';
            }
            ?>
            <br>
            <hr>
            <input type="button" id="sortear" value="sorteio"/>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $( ".numero" ).click(function() {
                var input = $(this);
                //verifica se o botão já foi clicado e remove a classe se já foi
                if(input.hasClass("active")){
                    input.removeClass("active");
                }else{
                    input.addClass("active");
                }
                //Verifica todos os botões e remove a classe de todos que tem a classe active menos que do que foi clicado
                $.each($( ".numero" ), function(index, value) {
                   if(input.val() != value.value){
                        $(this).removeClass("active");
                    }
                });
            });

            $( "#sortear" ).click(function() {
                alert($( ".active" ).val());
                $.get("api.php", function(data, status){
                    //convetendo o json para array
                    var dados = JSON.parse(data);
                    alert('o numero sorteado é ' +dados.numero_sorteado);
                });
            });

        });
    </script>
</body>
</html>