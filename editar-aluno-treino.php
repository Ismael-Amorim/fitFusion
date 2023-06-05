<?php

include("conexao-login.php");

$sql_treinos = "SELECT DISTINCT treino FROM treino WHERE chave = 0 ORDER BY treino ASC";
$sql_query_treinos = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_ter = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_qua = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_qui = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_sex = $mysqli->query($sql_treinos) or die($mysqli->error);
$sql_query_treinos_sab = $mysqli->query($sql_treinos) or die($mysqli->error);

$sql_usuario = "SELECT DISTINCT nome FROM cadastro WHERE nivel ='Aluno' ORDER BY nome ASC";
$sql_query_usuario = $mysqli->query($sql_usuario) or die($mysqli->error);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editrar treino alunos</title>
    <link rel="stylesheet" href="css/cadastro-aluno.css">
    <link rel="icon" href="logo1.png" type="img">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>


<body>
    <div class="boas-vindas">
        <span>Editar treino aluno</span><br>
        <span>Preencha as informações:</span>
    </div><br>
    <form method="GET" action="">
        <div class="infos">
            <span>Treinos:</span><br>
            <div id="treino">
            <div id="">
                <label>Nome:</label><br>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="nome" >
                    <option value=""></option>
                    <?php while($usuarios = $sql_query_usuario->fetch_assoc()){ ?>
                        <option value="<?php echo $usuarios['nome']; ?>"> <?php echo $usuarios['nome']; ?></option>
                    <?php   } ?>
                </select>
            </div><br>
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
            <button class="btn btn-primary" type="submit">Avançar</button><br><br>
            <a class="btn btn-primary" href="home-admin.php">Voltar</a>
                    </div>
            </form><br>
    </form>
    <?php
    if(empty($_GET['nome'])) {
    $retorna ="<div style='text-align: center' class='alert alert-danger' role='alert'>Necessario preencher o campo nome!";
        }elseif (empty($_GET['seg'])) {
    $retorna ="<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Segunda feira!";
        } elseif (empty($_GET['ter'])) {
    $retorna = "<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Terça feira";
        } elseif (empty($_GET['qua'])) {
    $retorna = "<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Quarta feira!";
        } elseif (empty($_GET['qui'])) {
    $retorna = "<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Quinta feira!";
        } elseif (empty($_GET['sex'])) {
    $retorna = "<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Sexta feira!";
        } elseif (empty($_GET['sab'])) {
    $retorna = "<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Necessario preencher o campo Sábado!";
        } 
        else {
            $query_usuario= "UPDATE cadastro SET nome='$_GET[nome]', seg='$_GET[seg]', ter='$_GET[ter]', qua='$_GET[qua]', qui='$_GET[qui]', sex='$_GET[sex]', sab='$_GET[sab]' WHERE nome='$_GET[nome]'";
            
            $edit_usuario = $mysqli->query($query_usuario);

            if ($query_usuario) {
                $retorna = "<div style='text-align: center' class='alert alert-success' role='alert'>Usuario editado com sucesso!";
            } else {
                $retorna ="<div style='text-align: center' class='alert alert-danger' role='alert'>Erro: Usuario não editado com sucesso!";
            }
        }

            echo json_encode($retorna);
?>
</body>

</html>