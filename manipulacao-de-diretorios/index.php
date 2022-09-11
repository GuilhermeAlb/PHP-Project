<?php
//MANIPULAÇÃO DE PASTAS
/*ESTRUTURA PARA CRIAR UMA NOVA PASTA.
*
*CASO JÁ EXISTA UMA PASTA COM AQUELE NOME,
*É GERADO UM NOVO NOME AUTOMATICAMENTE E SE
*NÃO HOUVER UMA PASTA COM O NOME ATUAL, ELA
*É CRIADA E O PROCESSO FINALIZADO.
*/

/*----niveis de permissoes dos diretórios----
// Escrita e leitura para o proprietario, nada ninguem mais
chmod ("/somedir/somefile", 0600);

// Escrita e leitura para o proprietario, leitura para todos os outros
chmod ("/somedir/somefile", 0644);

// Tudo para o proprietario, leitura e execucao para os outros
chmod ("/somedir/somefile", 0755);

// Tudo para o proprietario, leitura e execucao para o grupo do prop
chmod ("/somedir/somefile", 0750);

OBS.: para criar pasta e subpasta precisa do parâmetro 'true' depois do nivel de permissão
ex.:chmod ("/newdir/newdir/", 0750, true);
*/

//CRIAR UMA NOVA PASTA

//VAR PARA MANIPULAR O NOME DA PASTA
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

//DELETAR UMA PASTA

$deletarPasta = "pasta-teste";

if(is_dir($deletarPasta)){//SE A PASTA EXISTIR..
    echo "existe a pasta: ".$deletarPasta.". Removendo...<br>";
    rmdir($deletarPasta);//deletar diretorio

}
else {//se a pasta não existir
    echo "nao existe a pasta: ".$deletarPasta.". Não há o que remover..<br>";
}


//RENOMEAR PASTA
$novaPasta = "nova-pasta";
mkdir($novaPasta);
$renomearPasta = "pasta-renomeada";
if(is_dir($novaPasta)){//SE A PASTA EXISTIR..
    echo "existe a pasta: ".$novaPasta.". Renomeando para ".$renomearPasta."...<br>";
    rename($novaPasta, $renomearPasta);//renomear diretorio

}


//MOVER PASTA PARA OUTRO DIRETÓRIO
$novaPasta = "nova-pasta/subpasta";
mkdir($novaPasta);
if(is_dir($novaPasta)){//SE A PASTA EXISTIR..
    echo "existe a pasta: ".$novaPasta.". Movendo a pasta...<br>";
    rename($novaPasta, 'subpasta');/*O mesmo comando de renomear a pasta serve para mover a pasta
    *desde que você use no primeiro parametro o caminho de fora para dentro e no segundo parametro
    *somente o nome da pasta alvo. Ex.: rename('nova-pasta/subpasta', 'subpasta');
    */
}

?>