<?php
//variaveis com valores para a conexao
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "meu_banco";

//iniciar conexao
$pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);


//SEGURANÇA DE INSERSÃO
//LIMPAR DADOS DE ENTRADA MALICIOSOS
function limparDados($dado){
    $dado = trim($dado);
    $dado = htmlspecialchars($dado);
    $dado = stripslashes($dado);
    return $dado;
}



?>