<?php
include("cad_usuario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
    <link rel="stylesheet" href="css/cadastro-aluno.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="icon" href="logo1.png" type="img">
</head>

<body>
    <div class="boas-vindas">
        <span>Cadastrar aluno</span><br>
        <span>Preencha as informações solicitadas:</span>
    </div><br>

    <div class="infosTreino">
        <?php include("cadastro-aluno-treino.php"); ?>
    </div>
    <?php 
    if(empty($_GET)){ ?>
        <style>
            .infos{
                display: none;
            }
        </style>
    <?php ;}else{?>
        <style>
            .infos{
                display: block;
            }
            .infosTreino{
                display: none;
            }
        </style>

       <?php ;} ?> 

    <form method="POST" action="cad_usuario.php">
    <div class="infos">
            <span>Informações:</span><br>
            <div id="professor">
                <label>Professor:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="professor" id="professor" type="text" placeholder="Professor do aluno">
            </div><br>
            <div id="senha">
                <label>Senha:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="senha" id="senha" type="password" placeholder="Senha do aluno">
            </div><br>
            <div class="footer">
            <button class="btn btn-primary"><span><input class="btn btn-primary" type="submit" value="Cadastrar" name="cadUsuario"></span>
            </button><br><br>
            <a class="btn btn-primary" href="home-admin.php" target="_self"><span>Voltar</span></a>
        </div><br>
        </div>
        <div class="treinos_">
            <span>Treinos:</span>
            <div id="treino">
                <label>Segunda:</label><br>
                <input  name="seg" type="text" placeholder="Treino segunda-feira" value="<?php echo $_GET['seg']; ?>">
            </div><br>
            <div id="treino">
                <label>Terça:</label><br>
                <input name="ter" type="text" placeholder="Treino terça-feira" value="<?php echo $_GET['ter']; ?>">
            </div><br>
            <div id="treino">
                <label>Quarta:</label><br>
                <input name="qua" type="text" placeholder="Treino quarta-feira" value="<?php echo $_GET['qua']; ?>">
            </div><br>
            <div id="treino">
                <label>Quinta:</label><br>
                <input name="qui" type="text" placeholder="Treino quinta-feira" value="<?php echo $_GET['qui']; ?>">
            </div><br>
            <div id="treino">
                <label>Sexta:</label><br>
                <input name="sex" type="text" placeholder="Treino sexta-feira"  value="<?php echo $_GET['sex']; ?>">
            </div><br>
            <div id="treino">
                <label>Sábado:</label><br>
                <input name="sab" type="text" placeholder="Treino sábado" value="<?php echo $_GET['sab']; ?>">
            </div><br>
        </div>
        <div class="fisico_">
            <span>Avaliação física:</span><br>
            <div id="nome">
                <label>Nome:</label><br>
                <input required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="nome" id="nome" type="text" placeholder="Nome do aluno" value="<?php echo $_GET['nome']; ?>">
            </div><br>
            <div id="CPF">
                <label>CPF:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="cpf" id="cpf" type="text" placeholder="CPF do aluno" value="<?php echo $_GET['cpf']; ?>">
            </div><br>
           <div id="idade">
                <label>Idade:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="idade" id="idade" type="text" placeholder="Idade do aluno" value="<?php echo $_GET['idade']; ?>">
            </div><br>
            <div id="estatura">
                <label>Altura:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="estatura" id="estatura" type="text" placeholder="Estatura do aluno" value="<?php echo $_GET['estatura']; ?>">
            </div><br>
            <div id="peso">
                <label>Peso:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="peso" id="peso" type="text" placeholder="Peso do aluno" value="<?php echo $_GET['estatura']; ?>">
            </div><br>
            <div id="anamnese">
                <label>Anamnese:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="anamnese" id="anamnese" type="text" placeholder="Anamnese do aluno" value="<?php echo $_GET['anamnese']; ?>">
            </div><br>
            <div id="objetivo">
                <label>Objetivo:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="objetivo" id="objetivo" type="text" placeholder="Objetivo do aluno" value="<?php echo $_GET['objetivo']; ?>">
            </div><br>
            <span>Perimetria:</span><br><br>
            <div id="fisico">
                <label>Tórax:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="torax" type="text" placeholder="Centímetros" value="<?php echo $_GET['torax']; ?>">
            </div><br>
            <div id="fisico">
                <label>Abdomen:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="abdomen" type="text" placeholder="Centímetros" value="<?php echo $_GET['abdomen']; ?>">
            </div><br>
            <div id="fisico">
                <label>Cintura:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="cintura" type="text" placeholder="Centímetros" value="<?php echo $_GET['cintura']; ?>">
            </div><br>
            <div id="fisico">
                <label>Braço direito:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="braco_dir" type="text" placeholder="Centímetros" value="<?php echo $_GET['braco_dir']; ?>">
            </div><br>
            <div id="fisico">
                <label>Braço esquerdo:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="braco_esq" type="text" placeholder="Centímetros" value="<?php echo $_GET['braco_esq']; ?>">
            </div><br>
            <div id="fisico">
                <label>Coxa direita:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa_dir" type="text" placeholder="Centímetros" value="<?php echo $_GET['coxa_dir']; ?>">
            </div><br>
            <div id="fisico">
                <label>Coxa esquerda:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa_esq" type="text" placeholder="Centímetros" value="<?php echo $_GET['coxa_esq']; ?>">
            </div><br>
            <div id="fisico">
                <label>Ombro:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="ombro" type="text" placeholder="Centímetros" value="<?php echo $_GET['ombro']; ?>">
            </div><br>
            <div id="fisico">
                <label>Quadril:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="quadril" type="text" placeholder="Centímetros" value="<?php echo $_GET['quadril']; ?>">
            </div><br><br>
            <span>Dobras:</span>
            <br><br>
            <div id="fisico">
                <label>Tríceps:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="triceps" type="text" placeholder="% de gordura" value="<?php echo $_GET['triceps']; ?>">
            </div><br>
            <div id="fisico">
                <label>Abd:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="abd" type="text" placeholder="% de gordura" value="<?php echo $_GET['abd']; ?>">
            </div><br>
            <div id="fisico">
                <label>Ilíaca:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="iliaca" type="text" placeholder="% de gordura" value="<?php echo $_GET['iliaca']; ?>">
            </div><br>
            <div id="fisico">
                <label>Subs:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="subs" type="text" placeholder="% de gordura" value="<?php echo $_GET['subs']; ?>">
            </div><br>
            <div id="fisico">
                <label>Coxa:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa" type="text" placeholder="% de gordura" value="<?php echo $_GET['coxa']; ?>">
            </div><br><br>
            <div id="fisico">
                <label>Perc. de gordura(%):</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="gordura_total" type="text" placeholder="% de gordura total" value="<?php echo $_GET['gordura_total']; ?>"><br><br>
            <div id="fisico">
                <label>Próxima reavaliação:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="prox_reavaliacao" type="date" placeholder="Próxima reavaliação" value="<?php echo $_GET['prox_reavaliacao']; ?>">
            </div>
            </form><br>
</body>

</html>