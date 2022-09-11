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
    
    <form class="row g-3" method="post">
    
    <div class="col-md-4 text-center m-5">
        <label for="inputState" class="form-label">Upload de Arquivos</label>
        <select id="escolha-upload" name="escolha-upload" class="form-select">
        <option selected>Choose...</option>
        <option id = "unico-arquivo" name="unico-arquivo">Unico Arquivo</option>
        <option id = "multiplos-arquivos" name = "multiplos-arquivos">Multiplos Arquivos</option>
        </select>
    </div>
    <div class="col-12 m-5 ">
        <button class="btn btn-primary" type="submit" name="confirmar" id="confirmar">Confirmar</button>
    </div>
    </form>

    <?php
        if(isset($_POST['confirmar'])) {//se confirmou a escolha...

            //paginas
            $unico = "unico-arquivo.php";
            $multiplos = "multiplos-arquivos.php";

            if(isset($_POST['unico-arquivo'])) {
                header('location: '.$unico);
            }else{
                header('location: '.$multiplos);
            }





            /*if($_POST['unico-arquivo']){

            } elseif($_POST['multiplos-arquivos']){

            } else {
                echo '<div class="alert alert-danger" role="alert">
                Escolha uma das duas opções para iniciar.
          </div>';
            }*/


        }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


</body>
</html>