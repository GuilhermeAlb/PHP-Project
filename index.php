<?php
// $_GET
if(isset ($_GET['nome'])){
    $nome = $_GET['nome'];
}else{
    $nome = "mundo";
}
if(isset ($_GET['cor'])){
    $cor = htmlspecialchars($_GET['cor']);
}else{
    $cor = "cor";
}
if(isset ($_GET['idade'])){
    $idade = htmlspecialchars($_GET['idade']);
}else{
    $idade = "idade";
}
 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: <?php echo $cor; ?>
        }
    </style>
</head>
<body>

    <h1> nome: <?php echo $nome; ?> cor: <?php echo $cor; ?> idade: <?php echo $idade; ?> </h1>
    <a href = "index.php?nome=Vitoria&cor=pink"> ir para Vitoria <br><a>
                        <?php//script de mensagem como alerta ?>
    <a href = "index.php?nome=<script>alert('pagina hackeada')</script>&cor=black"> ir para Luciano<br><a>
    <a href = "index.php?nome=Estela&cor=plum"> ir para Estela<br><a>
    <a href = "index.php?nome=Guilherme&cor=gray"> ir para Guilherme<br><a>

    <form method = "get" > 
        <hr><br><br>
        <input type="text" name="nome" placeholder="Digite seu nome aqui"><br><br>
        <input type="text" name="cor" placeholder="Digite sua cor aqui"><br><br>
        <input type="text" name="idade" placeholder="Digite sua idade aqui"><br>
        <hr><button type="submit">enviar</buttom>
    </form>
</body>
</html>