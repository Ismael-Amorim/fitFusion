<?php
include("protect.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/home-admin.css">
    <link rel="icon" href="logo1.png" type="img">
</head>

<body>
        <?php if($_SESSION['nivel'] == "master"){ ?>
        <style>
            .master{
                display: block !important;
            }
        </style>
        <?php }else{ ?>
            <style>
            .master{
                display: none;
            }
        </style>
        <?php } ?>
    <div class="rodape">
        <!--<div id="logo">
            <img src="logo-academia.png" alt="logo">
        </div>
        -->
    </div>
    <div class="boas-vindas">
        <span>Bem vindo(a), <?php echo $_SESSION['name']?>!</span><br>
        <span>O que você deseja fazer?</span>
    </div>
        <div class="container">
    <div id="opcoes-admin">
        <a href="cadastro-aluno.php"><button class="full-rounded">
                <span>Cadastrar aluno</span>
                <div class="border full-rounded"></div>
            </button></a>
        <a href="cadastro-admin.php"><button class="full-rounded">
                <span>Cadastrar professor</span>
                <div class="border full-rounded"></div>
            </button></a>
            <a href="cadastro-treino.php" target="_self"><button class="full-rounded">
                <span>Cadastrar treino</span>
                <div class="border full-rounded"></div>
            </button></a>
            <a href="cadastro-exercicio.php" target="_self"><button class="full-rounded">
                <span>Cadastrar exercício</span>
                <div class="border full-rounded"></div>
            </button></a>
        <div class="master">
        <button class="full-rounded">
            <a href="consultar-todos.php"><span>Consultar todos</span>
                <div class="border full-rounded"></div>
        </button></a>
        </div>
        <button class="full-rounded">
            <a href="consultar-alunos.php"><span>Consultar alunos</span>
                <div class="border full-rounded"></div>
        </button></a>
        <button class="full-rounded">
            <a href="consultar-treino.php"><span>Consultar treinos</span>
                <div class="border full-rounded"></div>
        </button></a>
        <a href="editar-aluno-treino.php"><button class="full-rounded">
                <span>Editar treino aluno</span>
                <div class="border full-rounded"></div>
            </button></a>
            <a href="consultar-ficha.php"><button class="full-rounded">
                <span>Consultar ficha aluno</span>
                <div class="border full-rounded"></div>
            </button></a>
            <a href="consultar-historico-ficha.php"><button class="full-rounded">
                <span>Histórico de fichas</span>
                <div class="border full-rounded"></div>
            </button></a><br>
    </div>
            <div class="footer">
                <a href="logout.php" target="_self">
                    <button class="full-rounded">
                        <span>Sair</span>
                    </button>
                </a><br><br>
            </div>
    </div>

    <script src="/js/script.js" defer></script>
</body>

</html>