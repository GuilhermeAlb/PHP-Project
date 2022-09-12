<?php
//abrindo requerimento do arquivo conexao para logar no banco de dados
require("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Jquery incluido -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>CRUD DB</title>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">CRUD on my data base</h1>
        <form method="post" style = "">
        <div class="row">
            <div class="col">
                <br><input type="text" class="form-control" name="nome" placeholder="Digite o nome" aria-label="Digite o nome">
            </div>
            <div class="col">
                <br><input type="text" class="form-control" name="email" placeholder="Digite o email" aria-label="Digite o email">
            </div>
            <div class="col-12" style="margin-top: 20px;">
                <br><button type="submit" class="btn btn-primary"  name="salvar">Salvar</button>
                <br><hr>
            </div>
            <div class="col-12" style="">
                <a href="atualizar.php">Clique aqui para Atualizar dados na Tabela</a>
                
            </div>
            <div class="col-12" style="">
                <a href="deletar.php">Clique aqui para Deletar tuplas da Tabela</a>
                <br><hr>
            </div>
        </div>
            <!-- <button type="submit" name="salvar">Salvar</button> -->
        <style>
            table{
                margin-top: 10px;
                margin-left: 130px;
                margin-bottom: 200px;
                border-collapse: collapse;
                width: 80%; 
            }
            th,td {
                padding: 10px;
                text-align: center;
                border: 1px solid rgb(4, 43, 41);
            }
            th{
                background-color: rgb(76, 102, 102);
            }
            td{
                background-color: rgb(164, 190, 190);
            }
        </style>
        </form>
    </div>

    <?php
        if(isset($_POST['salvar']) && isset($_POST['nome']) && isset($_POST['email'])){

            //limparDados() em: db/conexao
            //insersão segura de dados
            $nome = limparDados($_POST['nome']);
            $email = limparDados($_POST['email']);
            $data = date ('d-m-Y');

            //VALIDAÇÕES DE CAMPO VAZIO
            if(($nome == "") || ($nome == null)) {
                echo '<div class="alert alert-danger" role="alert">
                O campo nome não pode estar vazio.
          </div>';
                exit();
            }
            if(($email == "") || ($email == null)) {
                echo '<div class="alert alert-danger" role="alert">
                O campo email não pode estar vazio.
          </div>';
                exit();
            }

            //VALIDAÇÕES DE NOME E EMAIL
            //se $nome só contem letras e espaços
            if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
                echo '<div class="alert alert-danger" role="alert">
                Somente letras e espaços são permitidos.
          </div>';
                exit();
            }

            //se $email foi inserido com formato de email.
            if(filter_var($nome, FILTER_VALIDATE_EMAIL)){
                echo '<div class="alert alert-danger" role="alert">
                Formato de email inválido.
          </div>';
                exit();
            }


            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null,?,?,?)");
            $sql->execute(array($nome,$email,$data));
            $dados = $sql->fetchAll();
            echo '<div class="alert alert-info" role="alert">
                    Cliente Inserido com sucesso!
                  </div>';
        }

    ?>


    <?php
        //SELECT (selecionar dados da tabela no banco de dados)
        $sql = $pdo->prepare("SELECT * FROM clientes");
        $email = 'ngsalbuquerque@gmail.com';
        $sql->execute();
        $dados = $sql->fetchAll();
        if(count($dados) > 0){
            echo "<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            ";
                                                //'for(){}' para percorrer o array de dados
            foreach ($dados as $chave => $valor) {//a dados sendo a chave, pegar o valor (coluna) da tabela
                echo "<tr>
                        <td>".$valor['id']."</td>
                        <td>".$valor['nome']."</td>
                        <td>".$valor['email']."</td>
                    </tr>
                ";
            }

            echo "</table>";
        } else {
            echo '<div class="alert alert-dark" role="alert">
                    Nenhum cliente Cadastrado!
                  </div>';
            }
        
    


    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>