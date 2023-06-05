<?php

include("conexao-login.php");

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Fusion</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="logo1.png" type="img">
</head>

<body>
    <div id="logo">
        <img src="logo1.png" alt="logo">
    </div>
    <div class="login">
    <form id="login-usuario" method="POST" action="">
    <div id="opcoes">
<?php
        if(isset($_POST['cpf']) || isset($_POST['senha'])){

if(strlen($_POST['cpf']) == 0){
    echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Necessario preencher o campo CPF!";
}else if(strlen($_POST['senha']) == 0){
    echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Necessario preencher o campo senha!";
}else{
    $cpf = $mysqli->real_escape_string($_POST['cpf']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    

    $sql_code = "SELECT * FROM cadastro WHERE cpf = '$cpf' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);


    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){
        $usuario = $sql_query->fetch_assoc();



        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['name'] = $usuario['nome'];
        $_SESSION['nivel'] = $usuario['nivel'];
        $_SESSION['seg'] = $usuario['seg'];
        $_SESSION['ter'] = $usuario['ter'];
        $_SESSION['qua'] = $usuario['qua'];
        $_SESSION['qui'] = $usuario['qui'];
        $_SESSION['sex'] = $usuario['sex'];
        $_SESSION['sab'] = $usuario['sab'];
        if(($_SESSION['nivel'] != "Aluno")){
        header("Location: home-admin.php");
        }else{
        header("Location: home-usuario.php");
        }

    }else{
        echo "<div style='text-align: center' class='msgAlertErroLogin' role='alert'>Erro: CPF ou senha incorretos!";
    }
}
}
?>
        <input for="cpf" id="cpf" name="cpf" type="text" placeholder="Digite seu CPF"><br />
        <input for="senha" id="senha" name="senha" type="password" placeholder="Digite sua senha"><br />
        <input type="submit" value="Entrar" class="full-rounded" id="entrar">
    </div>
    </form>
    </div>

    <!--<script src="js/custom.js"> </script>-->
</body>

</html>