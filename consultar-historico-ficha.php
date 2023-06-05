<?php
include("conexao-login.php");


include_once("conexao.php");

            if(empty($_GET['pesquisa'])){
                $query_usuarios = "SELECT * FROM avaliacoes ORDER BY nome ASC";
                $result_usuarios = $mysqli->query($query_usuarios) or die("Falha na execução do código SQL: " . $mysqli->error);
            }else{
                if(!empty($_GET['data_inicio'])){
                $query_usuarios = "SELECT * FROM avaliacoes WHERE cadastro BETWEEN '$_GET[data_inicio]' AND '$_GET[data_final]' AND nome LIKE '%$_GET[pesquisa]%' OR cpf LIKE '%$_GET[pesquisa]%' ORDER BY nome ASC";
                $result_usuarios = $mysqli->query($query_usuarios) or die("Falha na execução do código SQL: " . $mysqli->error);
                }else{
                    $query_usuarios = "SELECT * FROM avaliacoes WHERE nome LIKE '%$_GET[pesquisa]%' OR cpf LIKE '%$_GET[pesquisa]%' ORDER BY nome ASC";
                    $result_usuarios = $mysqli->query($query_usuarios) or die("Falha na execução do código SQL: " . $mysqli->error);
                }
            }
            
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Fichas</title>
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

                        <dt class="form-label">Idade</dt>
                        <dd class="form-control"><span id="idadeUsuario"></span></dd>

                        <dt class="form-label">Estatura</dt>
                        <dd class="form-control"><span id="estaturaUsuario"></span></dd>

                        <dt class="form-label">Peso</dt>
                        <dd class="form-control"><span id="pesoUsuario"></span></dd>

                        <dt class="form-label">Objetivo</dt>
                        <dd class="form-control"><span id="objetivoUsuario"></span></dd>

                        <dt class="form-label">Professor</dt>
                        <dd class="form-control"><span id="professorUsuario"></span></dd>

                        <dt class="form-label">Anamnese</dt>
                        <dd class="form-control"><span id="anamneseUsuario"></span></dd>

                        <dt class="form-label">Torax</dt>
                        <dd class="form-control"><span id="toraxUsuario"></span></dd>

                        <dt class="form-label">Abdomen</dt>
                        <dd class="form-control"><span id="abdomenUsuario"></span></dd>

                        <dt class="form-label">Cintura</dt>
                        <dd class="form-control"><span id="cinturaUsuario"></span></dd>

                        <dt class="form-label">Braço direito</dt>
                        <dd class="form-control"><span id="braco_dirUsuario"></span></dd>

                        <dt class="form-label">Braço esquerdo</dt>
                        <dd class="form-control"><span id="braco_esqUsuario"></span></dd>

                        <dt class="form-label">Coxa direita</dt>
                        <dd class="form-control"><span id="coxa_dirUsuario"></span></dd>

                        <dt class="form-label">Coxa esquerda</dt>
                        <dd class="form-control"><span id="coxa_esqUsuario"></span></dd>

                        <dt class="form-label">Quadril</dt>
                        <dd class="form-control"><span id="quadrilUsuario"></span></dd>

                        <dt class="form-label">Triceps</dt>
                        <dd class="form-control"><span id="tricepsUsuario"></span></dd>

                        <dt class="form-label">Abd</dt>
                        <dd class="form-control"><span id="abdUsuario"></span></dd>

                        <dt class="form-label">Iliaca</dt>
                        <dd class="form-control"><span id="iliacaUsuario"></span></dd>

                        <dt class="form-label">Subs</dt>
                        <dd class="form-control"><span id="subsUsuario"></span></dd>

                        <dt class="form-label">Coxa</dt>
                        <dd class="form-control"><span id="coxaUsuario"></span></dd>

                        <dt class="form-label">Gordura total</dt>
                        <dd class="form-control"><span id="gordura_totalUsuario"></span></dd>

                        <dt class="form-label">Próxima reavaliação</dt>
                        <dd class="form-control"><span id="prox_reavaliacaoUsuario"></span></dd>

                        <dt class="form-label">Cadastro</dt>
                        <dd class="form-control"><span id="cadastroUsuario"></span></dd>

                        <dt class="form-label">Criado por</dt>
                        <dd class="form-control"><span id="criacaoUsuario"></span></dd>

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
                    <h5 class="modal-title" id="editUsuarioModalLabel">Editar fichas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-ficha-form">
                        <span id="msgAlertaErroEdit"></span>

                        <input type="hidden" name="id" id="editid">
                        <input type="hidden" name="cpf" id="editcpf">


                        <div class="mb-3">
                            <label for="nome" class="col-form-label">Nome:</label>
                            <input type="text" name="nome" class="form-control" id="editnome">
                        </div>

                        <div class="mb-3">
                            <label for="idade" class="col-form-label">Idade:</label>
                            <input type="text" name="idade" class="form-control" id="editidade">
                        </div>

                        <div class="mb-3">
                            <label for="estatura" class="col-form-label">Estatura:</label>
                            <input type="text" name="estatura" class="form-control" id="editestatura">
                        </div>
                        
                        <div class="mb-3">
                            <label for="peso" class="col-form-label">Peso:</label>
                            <input type="text" name="peso" class="form-control" id="editpeso">
                        </div>
                        
                        <div class="mb-3">
                            <label for="objetivo" class="col-form-label">Objetivo:</label>
                            <input type="text" name="objetivo" class="form-control" id="editobjetivo">
                        </div>
                        
                        <div class="mb-3">
                            <label for="professor" class="col-form-label">Professor:</label>
                            <input type="text" name="professor" class="form-control" id="editprofessor">
                        </div>
                        
                        <div class="mb-3">
                            <label for="anamnese" class="col-form-label">Anamnese:</label>
                            <input type="text" name="anamnese" class="form-control" id="editanamnese">
                        </div>
                        
                        <div class="mb-3">
                            <label for="torax" class="col-form-label">Torax:</label>
                            <input type="text" name="torax" class="form-control" id="edittorax">
                        </div>
                        
                        <div class="mb-3">
                            <label for="abdomen" class="col-form-label">Abdomen:</label>
                            <input type="text" name="abdomen" class="form-control" id="editabdomen">
                        </div>
                        
                        <div class="mb-3">
                            <label for="cintura" class="col-form-label">Cintura:</label>
                            <input type="text" name="cintura" class="form-control" id="editcintura">
                        </div>
                        
                        <div class="mb-3">
                            <label for="braco_dir" class="col-form-label">Braço direito:</label>
                            <input type="text" name="braco_dir" class="form-control" id="editbraco_dir">
                        </div>
                        
                        <div class="mb-3">
                            <label for="braco_esq" class="col-form-label">Braço esquerdo:</label>
                            <input type="text" name="braco_esq" class="form-control" id="editbraco_esq">
                        </div>
                        
                        <div class="mb-3">
                            <label for="coxa_dir" class="col-form-label">Coxa direita:</label>
                            <input type="text" name="coxa_dir" class="form-control" id="editcoxa_dir">
                        </div>
                        
                        <div class="mb-3">
                            <label for="coxa_esq" class="col-form-label">Coxa esquerda:</label>
                            <input type="text" name="coxa_esq" class="form-control" id="editcoxa_esq">
                        </div>
                        
                        <div class="mb-3">
                            <label for="quadril" class="col-form-label">Quadril:</label>
                            <input type="text" name="quadril" class="form-control" id="editquadril">
                        </div>
                        
                        <div class="mb-3">
                            <label for="triceps" class="col-form-label">Triceps:</label>
                            <input type="text" name="triceps" class="form-control" id="edittriceps">
                        </div>
                        
                        <div class="mb-3">
                            <label for="abd" class="col-form-label">Abd:</label>
                            <input type="text" name="abd" class="form-control" id="editabd">
                        </div>
                        
                        <div class="mb-3">
                            <label for="iliaca" class="col-form-label">Iliaca:</label>
                            <input type="text" name="iliaca" class="form-control" id="editiliaca">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subs" class="col-form-label">Subs:</label>
                            <input type="text" name="subs" class="form-control" id="editsubs">
                        </div>
                        
                        <div class="mb-3">
                            <label for="coxa" class="col-form-label">Coxa:</label>
                            <input type="text" name="coxa" class="form-control" id="editcoxa">
                        </div>
                        
                        <div class="mb-3">
                            <label for="gordura_total" class="col-form-label">Gordura total:</label>
                            <input type="text" name="gordura_total" class="form-control" id="editgordura_total">
                        </div>
                        
                        <div class="mb-3">
                            <label for="prox_reavaliacao" class="col-form-label">Próxima reavaliação:</label>
                            <input type="date" name="prox_reavaliacao" class="form-control" id="editprox_reavaliacao">
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
        <span>Consultar histórico de fichas</span><br>
        <span>Usuários cadastrados:</span>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <form method="GET" id="pesquisar-form">
                <div class="input-group">
                <span class="input-group-text" id="addon-wrapping" style="width: 22rem !important">Período</span>
            </div>
            <div class="input-group flex-nowrap">
                    <input type="date" name="data_inicio" id="data_inicio">
                    <span class="input-group-text" id="addon-wrapping">Até</span>
                    <input type="date" name="data_final" id="data_final">
            </div>
                <div class="input-group">
                    <span class="input-group-text" id="addon-wrapping">Nome ou CPF</span>
                    <input id="pesquisa" type="text" class="form-control" placeholder="Nome ou CPF" name="pesquisa">
                    <button class="btn btn-primary" id="pesquisar" type="submit">Pesquisar</button>
                </div>
                </form>
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="text-align: center; display:none;">ID</th>
                                <th style="text-align: center;">CPF</th>
                                <th style="text-align: center;">Nome</th>
                                <th style="text-align: center;">Cadastro</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <?php while($dado_user = $result_usuarios->fetch_array()){ ?>
                            <tr>
                                <td style="text-align: center; display:none;"><?php echo $dado_user['id']; ?></td>
                                <td><?php echo $dado_user['cpf']; ?></td>
                                <td onclick="visUsuario(<?php echo $dado_user['id']?>)"><?php echo $dado_user['nome']; ?></td>
                                <td><?php echo date('d/m/Y', strtotime  ($dado_user['cadastro'])); ?></td>
                                <td>
                                    <button id='<?php echo $dado_user['id'] ?>' class='btn btn-outline-primary btn-sm' onclick="visUsuario(<?php echo $dado_user['id']?>)">Visualizar</button>
                                    <button style="display:none;" id=<?php echo $dado_user['id'] ?> class='btn btn-outline-warning btn-sm' onclick="editUsuario(<?php echo $dado_user['id']?>)">Editar</button>
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
    <script src="js/custom-historico-ficha.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>