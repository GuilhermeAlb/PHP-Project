<?php
$erroNome = "";
$erroEmail = "";
$erroSenha = "";
$erroRepeteSenha = "";

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //----NOME----
    //verificar se o campo nome está vazio
    if(empty($_POST['nome'])){
      $erroNome = "esse campo deve ser preenchido.";
    }
    else{
      //trazer o valor do campo nome do POST para uma variavel local $nome
      $nome = limparPost($_POST['nome']);

      //verificar se o $_POST['nome'] foi preenchido apenas com letras e espaços.
      if(!preg_match("/^[a-zA-Z-' ]*$/", $nome)){
        $erroNome = "É aceito apenas letras e espaços";
      }
    }

    //----EMAIL----
    //verificar se o campo email está vazio
    if(empty($_POST['email'])){
      $erroEmail = "esse campo deve ser preenchido.";
    }else{
      $email = limparPost($_POST['email']);
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erroEmail = "E-Mail invalido";
      }
    }


    //----SENHA----
    //verificar se o campo senha está vazio
    if(empty($_POST['senha'])){
      $erroSenha = "esse campo deve ser preenchido.";
    }else{
      $senha = limparPost($_POST['senha']);
      if(strlen($senha) < 6){
        $erroSenha = "a senha precisa ter mais que 5 caracteres";
      }
    }


    //----REPETE SENHA----
    //verificar se o campo repete senha está vazio
    if(empty($_POST['senha'])){
      $erroRepeteSenha = "esse campo deve ser preenchido.";
    }else{
      $repete_senha = limparPost($_POST['repete_senha']);
      if($repete_senha !== $senha){
        $erroRepeteSenha = "as senhas devem ser idênticas";
      }
    }


    //Se não houver nenhum erro, ou seja, todos os erros estiverem vazios, então o login pode ser efetuado
    if(($erroNome == "") && ($erroEmail == "") && ($erroSenha == "") && ($erroRepeteSenha == "")) {
      header('location: logado.php');
    }
  }

  //validação de segurança para evitar invasoes por meio das inserções de dados
  function limparPost ($valor){
    $valor = trim($valor);
    $valor = htmlspecialchars($valor);
    $valor = stripslashes($valor);
    return $valor;
  }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulário</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <main>
    <h1><span>AULA PHP</span><br>Validação de Formulário</h1>

     <form method="post">

        <!--para todos os campos de input abaixo:

        if(!empty($erro****)){echo "class='invalido'";}
         --- deixará o campo com uma borda vermelha. Ajuda ao usuário
             a encontrar o campo de entrada de dados incorreto.

        if(isset($_POST['nome'])) { echo "value='".$_POST['nome']."'"; }
        --- Essa condição serve para quando o usuário preencher um campo
            com os dados ou tipo de dados incorretos, para que quando ele
            tente enviar e receba a mensagem de erro, os dados anteriormente
            inseridos continuem escritos nos campos de input. 

        <span class="erro"> ?php echo $erroEmail;  </span> --- caso a validação
        tenha encontrado algum erro (campo vazio ou preenchido de forma não aceita)
        a mensagem de erro será exibida logo abaixo do campo de input
-->

        <!-- NOME COMPLETO -->
        <label> Nome Completo </label>
        <input type="text" <?php if(!empty($erroNome)){echo "class='invalido'";} ?> <?php if(isset($_POST['nome'])) { echo "value='".$_POST['nome']."'"; } ?> name="nome" placeholder="Digite seu nome" required>
        <br><span class="erro"> <?php echo $erroNome;?></span>

        <!-- EMAIL -->
        <label> E-mail </label>
        <input type="email" name="email" <?php if(!empty($erroEmail)){echo "class='invalido'";} ?> <?php if(isset($_POST['email'])) { echo "value='".$_POST['email']."'"; } ?> placeholder="email@provedor.com" required>
        <br><span class="erro"> <?php echo $erroEmail;?></span>

        <!-- SENHA -->
        <label> Senha </label>
        <input type="password" name="senha" <?php if(!empty($erroSenha)){echo "class='invalido'";} ?> <?php if(isset($_POST['senha'])) { echo "value='".$_POST['senha']."'"; } ?> placeholder="Digite uma senha" required>
        <br><span class="erro"> <?php echo $erroSenha;?></span>

        <!-- REPETE SENHA -->
        <label> Repete Senha </label>
        <input type="password" name="repete_senha" <?php if(!empty($erroRepeteSenha)){echo "class='invalido'";} ?> <?php if(isset($_POST['repete_senha'])) { echo "value='".$_POST['repete_senha']."'"; } ?> placeholder="Repita a senha" required>
        <br><span class="erro"> <?php echo $erroRepeteSenha;?></span>

        <button type="submit"> Enviar Formulário </button>

      </form>
    </main>
</body>
</html>