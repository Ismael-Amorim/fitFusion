<?php

session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar treinos</title>
    <link rel="stylesheet" href="css/cadastro-treino.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="logo1.png" type="img">
</head>

<body>
    <div class="boas-vindas">
        <span>Cadastrar treino</span><br>
        <span>Preencha as informações solicitadas:</span>
    </div><br>
    <form method="POST" action="cad_treino.php">
        <div class="opcoes">
        <div class="infos" id="infos">
            <div class="treinos">
            <span>Treinos:</span><br><br>
            <div id="treino">
                <label>Treino:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="treino[]" id="treino" type="text" placeholder="">
            </div><br>
            <div id="exercicio">
                <label>Exercício:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="exercicio[]" id="exercicio" type="text" placeholder="">
            </div><br>
            <div id="series">
                <label>Séries:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="series[]" id="series" type="text" placeholder="">
            </div><br>
            <div id="repeticoes">
                <label>Repetições:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="repeticoes[]" id="repeticoes" type="text" placeholder="">
            </div><br>
            <div id="obs">
                <label>Observação:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="obs[]" id="obs" type="text" placeholder="">
            </div><br>
            </div>
            <button class="btn btn-primary" type="button" onclick="adicionarCampo()">+ Exercício</button><br><br>
            </div>
        <div class="footer">
            <input class="btn btn-primary" type="submit" value="Cadastrar" name="cadTreino"><br>
    </form>
            <a class="btn btn-primary" href="home-admin.php" target="_self"><span> Voltar</span></a>
        </div>
        </div>

        <script src="js/script.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>