<?php
session_start();
$_SESSION['nome'] = "Guilherme";
$_SESSION['idade'] = "20 anos";
$_SESSION['sexo'] = "Masculino";

/* -----------------------   SESSION   ------------------------
Um array associativo contendo variáveis de sessão disponíveis
para o atual script. Veja a documentação das funções de Sessão
para mais informação em como usar isto.

                 -------------------------------
 
Esta é uma 'superglobal', ou variável global automática. Isto
significa que ela está disponível em todos escopos pelo script.
Não há necessidade de fazer global $variable; para acessá-la
dentro de uma função ou método.

                 -------------------------------

session_start() - Inicia uma nova sessão ou resume uma sessão existente

                 -------------------------------

CRIAR OU INICIAR SESSION
--> session_start()

REMOVER VARIÁVEIS DA SESSION
--> session_unset();

DESTRUIR UMA SESSION
--> session_destroy();
*/



?>