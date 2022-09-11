<?php

//MANIPULAÇÃO DE ARQUIVOS

/*
//-----            CRIANDO UMA PASTA PARA GUARDAR OS ARQUIVOS MANIPULADOS            ------//
$novaPasta = "pasta-teste";
if(is_dir($novaPasta)){//SE A PASTA EXISTIR..
    echo "existe a pasta: ".$novaPasta.". Gerando um novo nome...<br>";
    for($i = 1;  ; $i ++) {//LOOP PARA GERAR NOVOS NOMES
                           //O FOR SÓ PARA QUANDO CHEGAR NO "break;"
        $novaPasta = $novaPasta."(".$i.")";
        if(is_dir($novaPasta)){//quando o nome gerado já existir, um novo nome será gerado
            echo "existe a pasta: ".$novaPasta.". Gerando um novo nome...<br>";
        }
        else {//se o novo nome não pertencer à uma pasta já existente, ela será criada
            echo "nao existe a pasta: ".$novaPasta.". Criando...<br>";
            mkdir($novaPasta, 0755);
            break;
        }
    }
}
else {//se o nome não pertencer à uma pasta já existente, ela será criada
    echo "nao existe a pasta: ".$novaPasta.". Criando...<br>";
    mkdir($novaPasta, 0755);
}
*/

//------------------------   INICIO DA MANIPULAÇÃO DE ARQUIVOS   ------------------------
$nomeArquivo = date ('y-m-d-H-i-s').".txt";
//fopen cria ou abre um arquivo caso ele já exista
//2 parametros: o 1° é o nome do arquivo e o 2° como quer abri-lo
//consultar o manual do 'fopen' no próprio site do php
$arquivo = fopen($nomeArquivo, 'a+'); 
fwrite($arquivo,'uma linha injetada pelo php '.PHP_EOL); // Abre o arquivo e escreve
//obs.: o PHP_EOL quebra linha dentro do arquivo
fclose($arquivo);//para fechar o arquivo


//---------------------------------   ler um arquivo   ---------------------------------
$nomeArquivo = "leitura".".txt";
$arquivo = fopen($nomeArquivo, 'a+'); 
fwrite($arquivo,'uma linha injetada pelo php '.PHP_EOL); 
fclose($arquivo);


if(file_exists($nomeArquivo)){//se o arquivo existir
    $abrirArquivo = fopen($nomeArquivo,'r');

    while(!feof($abrirArquivo)) { //enquanto nao chegar no final do arquivo
        echo fgets($abrirArquivo)."<br>";//exibir uma linha do arquivo
    }
    fclose($abrirArquivo);
}


?>