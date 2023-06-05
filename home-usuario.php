<?php
 include("protect.php");
 include("conexao-login.php");

    $seg = $_SESSION['seg'];
    $ter = $_SESSION['ter'];
    $qua = $_SESSION['qua'];
    $qui = $_SESSION['qui'];
    $sex = $_SESSION['sex'];
    $sex = $_SESSION['sex'];
    $sab = $_SESSION['sab'];


 #var_dump($_SESSION);
 #var_dump($_SESSION['seg']);

#var_dump($ter);

 
 $sql_cod = "SELECT * FROM treino" ;
 $sql_qry = $mysqli->query($sql_cod) or die("ERRO" . $mysqli->error);

$consulta = "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs  FROM treino WHERE treino = '$seg'";
$consulta_ter = "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs   FROM treino WHERE treino = '$ter'";
$consulta_qua = "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs   FROM treino WHERE treino = '$qua'";
$consulta_qui = "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs   FROM treino WHERE treino = '$qui'";
$consulta_sex= "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs   FROM treino WHERE treino = '$sex'";
$consulta_sab = "SELECT treino, qtd_repeticoes, qtd_series, exercicio, obs   FROM treino WHERE treino = '$sab'";

$con = $mysqli->query($consulta) or die($mysqli->error);
$con_ter = $mysqli->query($consulta_ter) or die($mysqli->error);
$con_qua = $mysqli->query($consulta_qua) or die($mysqli->error);
$con_qui = $mysqli->query($consulta_qui) or die($mysqli->error);
$con_sex = $mysqli->query($consulta_sex) or die($mysqli->error);
$con_sab = $mysqli->query($consulta_sab) or die($mysqli->error);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home-usuario.css">
    <link rel="stylesheet" href="css/treinos.css">
    <link rel="icon" href="logo1.png" type="img">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="boas-vindas">
        <span>Bem vindo(a), <?php echo $_SESSION['name']; ?>! <br>Bora treinar!?</span><br>
        <span>Selecione o dia da semana:</span>
    </div>
      <div id="dias-semana">
    <button id="esconder-mostrar" class="full-rounded">
            <span>Segunda</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container"><br>
                        <?php while($dado = $con->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado['qtd_series'] ."x" . $dado['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
        <button id="esconder-mostrar1" class="full-rounded">
            <span>Terça</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container1"><br>
                        <?php while($dado_ter = $con_ter->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado_ter['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_ter['qtd_series'] ."x" . $dado_ter['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_ter['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
            <button id="esconder-mostrar2" class="full-rounded">
            <span>Quarta</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container2"><br>
            <?php while($dado_qua = $con_qua->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado_qua['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_qua['qtd_series'] ."x" . $dado_qua['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_qua['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
            <button id="esconder-mostrar3" class="full-rounded">
            <span>Quinta</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container3"><br>
            <?php while($dado_qui = $con_qui->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado_qui['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_qui['qtd_series'] ."x" . $dado_qui['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_qui['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
            <button id="esconder-mostrar4" class="full-rounded">
            <span>Sexta</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container4"><br>
            <?php while($dado_sex = $con_sex->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado_sex['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_sex['qtd_series'] ."x" . $dado_sex['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_sex['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
            <button id="esconder-mostrar5" class="full-rounded">
            <span>Sábado</span>
            <div class="border full-rounded">
            </div>
        </button>
            <div id="container5"><br>
            <?php while($dado_sab = $con_sab->fetch_array()){ ?><hr>
                        <span class="exercicio"><?php echo$dado_sab['exercicio'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_sab['qtd_series'] ."x" . $dado_sab['qtd_repeticoes'] ?></span>
                        <span class="series_repeticoes"><?php echo $dado_sab['obs'] ?></span><hr>
                        <?php }?>
            <div>
            </div>
            </div>
            </div>

            <div class="footer">
                <a href="logout.php" target="_self">
                    <button class="full-rounded">
                        <span>Sair</span>
                    </button>
                </a><br><br>
            </div>

    <script src="js/script.js" defer></script>
    
</body>

</html>