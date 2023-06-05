<?php

session_start();
include("protect.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
    <link rel="stylesheet" href="css/cadastro-aluno.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="icon" href="logo1.png" type="img">
</head>

<body>
    <div class="boas-vindas">
        <span>Cadastrar professor</span><br>
        <span>Preencha as informações solicitadas:</span>
    </div><br>
    <form method="POST" action="cad_admin.php">
        <div class="infos">
            <span>Informações:</span>
            <div id="nome">
                <label>Nome:</label><br>
                <input required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="nome" id="nome" type="text" placeholder="">
            </div><br>
            <div id="CPF">
                <label>CPF:</label><br>
                <input required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="cpf" id="cpf" type="text" placeholder="">
            </div><br>
            <div id="senha">
                <label>Senha:</label><br>
                <input required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="senha" id="senha" type="password" placeholder="">
            </div><br>
            <div id="nivel">
                <label>Nível:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="nivel" id="nivel" type="text" placeholder="">
            </div><br>
            <div class="footer">
            <span><input class="btn btn-primary" type="submit" value="Cadastrar" name="cadProf"></span><br> <br>
            <a class="btn btn-primary" href="home-admin.php" target="_self"><span>Voltar</span></a>
        </div>
        </div>
    </form>
</body>

</html>