<?php

include("conexao-login.php");

$sql_treinos = "SELECT DISTINCT treino FROM treino WHERE chave = 0 ORDER BY treino ASC";
$sql_query_treinos = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_ter = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_qua = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_qui = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_sex = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_sab = $mysqli->query($sql_treinos) or die($mysqli->error);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Aluno</title>
    <link rel="stylesheet" href="css/cadastro-aluno.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <form method="GET" action="">
        <div class="infosTreino">
        <span>Informações:</span><br>
        <div id="nome">
                <label>Nome:</label><br>
                <input required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="nome" id="nome" type="text" placeholder="Nome do aluno">
            </div><br>
            <div id="CPF">
                <label>CPF:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="cpf" id="cpf" type="text" placeholder="CPF do aluno">
            </div><br>
           <div id="idade">
                <label>Idade:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="idade" id="idade" type="text" placeholder="Idade do aluno">
            </div><br>
            <span>Avaliação física:</span><br>
            <div id="estatura">
                <label>Altura:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="estatura" id="estatura" type="text" placeholder="Estatura do aluno">
            </div><br>
            <div id="peso">
                <label>Peso:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="peso" id="peso" type="text" placeholder="Peso do aluno">
            </div><br>
            <div id="anamnese">
                <label>Anamnese:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="anamnese" id="anamnese" type="text" placeholder="Anamnese do aluno">
            </div><br>
            <div id="objetivo">
                <label>Objetivo:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="objetivo" id="objetivo" type="text" placeholder="Objetivo do aluno">
            </div><br>
            <span>Perimetria:</span><br><br>
            <div id="fisico">
                <label>Tórax:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="torax" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Abdomen:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="abdomen" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Cintura:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="cintura" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Braço dir:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="braco_dir" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Braço esq:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="braco_esq" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Coxa dir:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa_dir" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Coxa esq:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa_esq" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Ombro:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="ombro" type="text" placeholder="Centímetros">
            </div><br>
            <div id="fisico">
                <label>Quadril:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="quadril" type="text" placeholder="Centímetros">
            </div><br><br>
            <span>Dobras:</span>
            <br><br>
            <div id="fisico">
                <label>Tríceps:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="triceps" type="text" placeholder="% de gordura">
            </div><br>
            <div id="fisico">
                <label>Abd:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="abd" type="text" placeholder="% de gordura">
            </div><br>
            <div id="fisico">
                <label>Ilíaca:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="iliaca" type="text" placeholder="% de gordura">
            </div><br>
            <div id="fisico">
                <label>Subs:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="subs" type="text" placeholder="% de gordura">
            </div><br>
            <div id="fisico">
                <label>Coxa:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="coxa" type="text" placeholder="% de gordura">
            </div><br><br>
            <div id="fisico">
                <label>Perc. de gordura(%):</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="gordura_total" type="text" placeholder="% de gordura total"><br><br>
            <div id="fisico">
                <label>Próxima reavaliação:</label><br>
                <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="prox_reavaliacao" type="date" placeholder="Próxima reavaliação">
            </div><br>
            <span>Treinos:</span><br>
            <div id="treino">
            <label>Segunda feira</label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="seg" >
                    <option value=""></option>
                    <?php while($treinos = $sql_query_treinos->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos['treino']; ?>"> <?php echo $treinos['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <div id="treino">
            <label>Terça feira</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ter" >
                    <option value=""></option>
                    <?php while($treinos_ter = $sql_query_treinos_ter->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos_ter['treino']; ?>"> <?php echo $treinos_ter['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <div id="treino">
            <label>Quarta feira</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="qua" >
                    <option value=""></option>
                    <?php while($treinos_qua = $sql_query_treinos_qua->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos_qua['treino']; ?>"> <?php echo $treinos_qua['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <div id="treino">
            <label>Quinta feira</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="qui" >
                    <option value=""></option>
                    <?php while($treinos_qui = $sql_query_treinos_qui->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos_qui['treino']; ?>"> <?php echo $treinos_qui['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <div id="treino">
            <label>Sexta feira</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sex" >
                    <option value=""></option>
                    <?php while($treinos_sex = $sql_query_treinos_sex->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos_sex['treino']; ?>"> <?php echo $treinos_sex['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <div id="treino">
            <label>Sábado</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sab" >
                    <option value=""></option>
                    <?php while($treinos_sab = $sql_query_treinos_sab->fetch_assoc()){ ?>
                        <option value="<?php echo $treinos_sab['treino']; ?>"> <?php echo $treinos_sab['treino']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
            <a class="btn btn-primary" href="home-admin.php">Voltar</a><br><br>
            <button class="btn btn-primary" type="submit">Avançar</button>
            </div>
        </div>
    </form>
</body>

</html>