<?php
    if(isset($_POST['nome']) && isset($_POST['idade'])){
        $nome = limparPost($_POST['nome']);
        $idade = limparPost($_POST['idade']);
        echo "<h2>nome: $nome <br> | idade: $idade <br><hr></h2>";
    }


    /*para a segurança do sistema.
    *evitar que terceiros insiram scripts em campos de entrada de dados
    */
    function limparPost($valor) {
        //remove os espaços antes e depois da string, alem de alguns caracteres especiais
        $valor = trim($valor); 
        //remove as '/' (barras) e codigos como '<br>' ou '<spript>'
        $valor = stripslashes($valor);
        //mesma função de remover caracteres especiais do html
        $valor = htmlspecialchars($valor);
        return $valor;
    }
    

?>