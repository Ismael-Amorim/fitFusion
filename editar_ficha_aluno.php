<?php
include("cad_usuario.php");
include("protect.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/cadastro-aluno.css">
</head>

<body>
    <div class="rodape">
        <div id="logo">
            <img src="logo.png" alt="logo">
        </div>
    </div>
    <div class="boas-vindas">
        <span>Editar ficha do aluno</span><br>
        <span>Preencha o CPF para buscar:</span>
    </div><br>
    <form method="POST" action="cad_usuario.php">
        <div class="infos">
            <div id="nome">
            <div id="CPF">
                <label>CPF:</label><br>
                <input name="cpf" id="cpf" type="text" placeholder="CPF">
            </div><br>
                <label>Nome:</label><br>
                <input name="nome" id="nome" type="text" placeholder="Nome">
            </div><br>
            <div id="idade">
                <label>Idade:</label><br>
                <input name="idade" id="idade" type="text" placeholder="Idade">
            </div><br>
            <div id="estatura">
                <label>Estatura:</label><br>
                <input name="estatura" id="estatura" type="text" placeholder="Estatura">
            </div><br>
            <div id="peso">
                <label>Peso:</label><br>
                <input name="peso" id="peso" type="text" placeholder="Quilos">
            </div><br>
            <div id="objetivo">
                <label>Objetivo:</label><br>
                <input name="objetivo" id="objetivo" type="text" placeholder="Objetivo">
            </div><br>
            <div id="professor">
                <label>Professor:</label><br>
                <input name="professor" id="professor" type="text" placeholder="Professor">
            </div><br>
            <div id="anamnese">
                <label>Anamnese:</label><br>
                <input name="anamnese" id="anamnese" type="text" placeholder="Anamnese">
            </div><br>
        </div>
        <div class="fisico">
            <span>Avaliação física:</span><br>
            <span>Perimetria:</span><br><br>
            <div id="fisico">
                <label>Tórax:</label><br>
                <input name="torax" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Abdomen:</label><br>
                <input name="abdomen" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Cintura:</label><br>
                <input name="cintura" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Braço dir:</label><br>
                <input name="braco_dir" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Braço esq:</label><br>
                <input name="braco_esq" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Coxa dir:</label><br>
                <input name="coxa_dir" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Coxa esq:</label><br>
                <input name="coxa_esq" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Ombro:</label><br>
                <input name="ombro" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Quadril:</label><br>
                <input name="quadril" type="text" placeholder="Centímetros">
            </div><br>
            <span>Dobras:</span>
            <br>
            <div id="fisico">
                <label>Tríceps:</label><br>
                <input name="triceps" type="text" placeholder="%">
            </div><br>
            <div id="fisico">
                <label>Abd:</label><br>
                <input name="abd" type="text" placeholder="%">
            </div><br>
            <div id="fisico">
                <label>Ilíaca:</label><br>
                <input name="iliaca" type="text" placeholder="%">
            </div><br>
            <div id="fisico">
                <label>Subs:</label><br>
                <input name="subs" type="text" placeholder="%">
            </div><br>
            <div id="fisico">
                <label>Coxa:</label><br>
                <input name="coxa" type="text" placeholder="%">
            </div><br><br>
            <div id="fisico">
                <label>Perc. de gordura(%):</label><br>
                <input name="gordura_total" type="text" placeholder="% total"><br><br>
            <div id="fisico">
                <label>Próxima reavaliação:</label><br>
                <input name="prox_reavaliacao" type="date" placeholder="Próxima reavaliação">
            </div><br>
            </form>
        <div class="footer">
            <button class="button"><span><input type="submit" value="Salvar" name="salvarCadUsuario"></span>
            </button><br>
            <a href="home-admin.php" target="_self"><span>Voltar</span></a>
        </div><br>
    </form>
</body>

</html>