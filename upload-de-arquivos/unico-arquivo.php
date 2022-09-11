<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <h1 class = "mt-5 text-center">Upload de Arquivos</h1>
        <form method="post" enctype="multipart/form-data" class="m-3">
            <div class="input-group">
                <input type="file" class="form-control" id="arquivo" name="arquivo" aria-describedby="arquivo" aria-label="Upload">
                <button class="btn btn-primary" type="submit" name="enviar" id="enviar">Enviar</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_POST['enviar'])){
        
        //validações

        //tamanho maximo permitido para o arquivo de upload
        $tamanhoMax = 2097152;

        //tipo permitido de arquivo para upload
        $permitido = array("png","jpg","jpeg","txt", "zip");

        //validação de tipo de arquivo
        $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);

        //------------- INICIO DA VALIDAÇÃO -------------

        //caso o arquivo seja > 2Mb. Não será feito upload
        if(($_FILES['arquivo']['size']) > $tamanhoMax){
           
            echo '<div class="alert alert-danger" role="alert">
           O arquivo excede o tamanho maximo permitido!
          </div>';

        }else{//caso o arquivo seja <= 2Mb. Então o upload poderá ser realizado.
            if(in_array($extensao, $permitido)){//se a extensao do arquivo enviado for permitida
                $pasta = "imagens/";
                if(!is_dir($pasta)){//caso a pasta para realizar o upload dentro dela não existir
                    mkdir($pasta);//criar pasta
                }
                $tmp = $_FILES['arquivo']['tmp_name'];//pegando o nome temporario do arquivo no servidor
                $novoNome = uniqid().".$extensao";//dando um nome unico para o arquivo com o --> uniqid()

                if(move_uploaded_file($tmp,$pasta.$novoNome)){//move_uploaded_file --> função para fazer o upload do arquivo com parametros: (<nome-temporario-do-arquivo>,<Local-para-fazer-upload>.<nome-que-o-arquivo-receberá-na-pasta>)
                    echo '<div class="alert alert-info" role="alert">
                    Upload realizado com sucesso!
                  </div>';
                }else {
                    echo "Não foi possivel fazer o upload do arquivo. Tente novamente com outro arquivo";
                }
                
            }else{//exibir um alerta dizendo que o arquivo não é permitido. Causa --> extensao
                echo '<div class="alert alert-danger" role="alert">
                tipo de arquivo não suportado. Tente novamente com outro arquivo.
          </div>';
               
            }

        }




    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>
</html>