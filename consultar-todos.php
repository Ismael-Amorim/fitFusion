<?php
include("conexao-login.php");

include_once("conexao.php");


if(empty($_GET['pesquisa'])){
    $query_usuarios = "SELECT * FROM cadastro ORDER BY nome ASC";
    $result_usuarios = $mysqli->query($query_usuarios) or die("Falha na execução do código SQL: " . $mysqli->error);
}else{
    $query_usuarios = "SELECT * FROM cadastro WHERE nome LIKE '%$_GET[pesquisa]%' OR cpf LIKE '%$_GET[pesquisa]%' ORDER BY nome ASC";
    $result_usuarios = $mysqli->query($query_usuarios) or die("Falha na execução do código SQL: " . $mysqli->error);
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Usuários</title>
    <link rel="stylesheet" href="css/consultar_alunos.css">
    <link rel="icon" href="logo1.png" type="img">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<div class="container">
<div class="modal fade" id="visUsuarioModal" tabindex="-1" aria-labelledby="visUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visUsuarioModalLabel">Informações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">
                        <dt class="form-label">ID</dt>
                        <dd class="form-control"><span id="idUsuario"></span></dd>

                        <dt class="form-label">Nome</dt>
                        <dd class="form-control"><span id="nomeUsuario"></span></dd>

                        <dt class="form-label">CPF</dt>
                        <dd class="form-control"><span id="cpfUsuario"></span></dd>

                        <dt class="form-label">Senha</dt>
                        <dd class="form-control"><span id="senhaUsuario"></span></dd>

                        <dt class="form-label">Criado por</dt>
                        <dd class="form-control"><span id="criacaoUsuario"></span></dd>

                        <dt class="form-label">Status</dt>
                        <dd class="form-control"><span id="statusUsuario"></span></dd>

                    </dl>
                </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                        </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editUsuarioModal" tabindex="-1" aria-labelledby="editUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUsuarioModalLabel">Editar informações</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-todos-form">
                        <span id="msgAlertaErroEdit"></span>

                        <input type="hidden" name="id" id="editid">

                        <div class="mb-3">
                            <label for="cpf" class="col-form-label">CPF:</label>
                            <input type="text" name="cpf" class="form-control" id="editcpf">
                        </div>
                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="editnome">
                        </div>
                        <div class="mb-3">
                            <label for="senha" class="col-form-label">Senha:</label>
                            <input type="text" name="senha" class="form-control" id="editsenha">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="col-form-label">Status:</label>
                            <input type="text" name="status" class="form-control" id="editstatus">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-usuario-btn" value="Salvar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="boas-vindas">
        <span>Consultar usuários</span><br>
        <span>Usuários cadastrados:</span>
    </div>

    <span id="msgAlerta"></span>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <form method="GET" id="pesquisar-form">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Nome ou CPF</span>
                    <input id="pesquisa" type="text" class="form-control" placeholder="Digite o nome ou CPF" name="pesquisa"> 
                    <button class="btn btn-secondary" type="submit">Pesquisar</button>
                </div>
                </form>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center; display:none;">ID</th>
                                <th style="text-align: center;">CPF</th>
                                <th style="text-align: center;">Nome</th>
                                <th style="text-align: center;">Senha</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <?php while($dado_user = $result_usuarios->fetch_array()){ ?>
                            <tr>
                                <td style="display:none;"><?php echo $dado_user['id']; ?></td>
                                <td><?php echo $dado_user['cpf']; ?></td>
                                <td><?php echo $dado_user['nome']; ?></td>
                                <td><?php echo $dado_user['senha']; ?></td>
                                <td>
                                    <button id='<?php echo $dado_user['id'] ?>' class='btn btn-outline-primary btn-sm' onclick="visUsuario(<?php echo $dado_user['id']?>)">Visualizar</button>
                                    <button id=<?php echo $dado_user['id'] ?> class='btn btn-outline-warning btn-sm' onclick="editUsuario(<?php echo $dado_user['id']?>)">Editar</button>
                                    <button id=<?php echo $dado_user['id'] ?> class='btn btn-outline-danger btn-sm' onclick="apagarUsuario(<?php echo $dado_user['id']?>)">Apagar</button>
                                </td>
                            </tr>
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="footer">
        <button class="btn btn-primary"><a style="text-decoration: none; color: black;" href="home-admin.php" target="_self">Voltar</button></a>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/custom2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>