<?php

//-------INTRODUÇÃO AOS COOKIES---------
/*
*
A função setcookie() define um cookie para ser enviado juntamente
com os cabeçalhos HTTP. Como outros cabeçalhos (headers), os cookies
devem ser enviados antes de qualquer saída do seu script (isso é uma
restrição do protocolo). O que quer dizer que você deve colocar
chamadas a essa função antes de qualquer saída, incluindo as tags <html>
e <head> assim como espaços em branco.

Uma vez que os cookies foram setados, eles podem ser acessados no próximo
carregamento da página através do array $_COOKIE. Os valores dos cookies
também podem existir no $_REQUEST
*
*/

/*
------------------------- PARÂMETROS DO setcookie() -------------------------
-----------------------------------------------------------------------------

PARA: CRIAR | MODIFICAR | DELETAR
---> setcookie(nomechave, valor, validade);

PARA PEGAR O VALOR DO COOKIE
---> $_COOKIE

---> name
O nome do cookie.

---> value
O valor do cookie. Esse valor é guardado no computador do cliente; não guarde
informação sensível. Supondo que o name seja 'nomedocookie', o valor pode ser
lido através de $_COOKIE['nomedocookie']

---> expires_or_options
O tempo para o cookie expirar. Esse valor é uma timestamp Unix, portanto é o
número de segundos desde a época (epoch). Um jeito de configurar esse valor é
por adicionando o número de segundos que o cookie deve durar antes de expirar
ao resultado da função time(). Por exemplo, time()+60*60*24*30 irá configurar
o cookie para expirar em 30 dias. Outra opção é usar a função mktime().
Se configurado para 0 ou omitido, o cookie vai expirar no final da sessão
(ao navegador fechar).

*/

//COOKIE PARA GUARDAR NOME:
//obs.: time() ---> 86400 equivalem aos segundos de 1 dia
//o campo de tempo deve ser preenchidos em unidade de seg.
setcookie('nome','Albuquerque', time()+(86400 * 30));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        if(isset($_COOKIE['nome'])){
            echo "existe um cookie de nome: ".$_COOKIE['nome'];
        }else {
            echo "não existem cookies com nomes pelo localhost.";
        }


    ?>


</body>
</html>

