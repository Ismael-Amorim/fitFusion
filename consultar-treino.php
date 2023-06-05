<?php
include("conexao-login.php");

if(empty($_GET['pesquisa'])){
    $query_treinos = "SELECT * FROM treino ORDER BY treino ASC";
    $result_treinos = $mysqli->query($query_treinos) or die("Falha na execução do código SQL: " . $mysqli->error);
}else{
    $query_treinos = "SELECT * FROM treino WHERE treino LIKE '%$_GET[pesquisa]%' OR exercicio LIKE '%$_GET[pesquisa]%' ORDER BY treino ASC";
    $result_treinos = $mysqli->query($query_treinos) or die("Falha na execução do código SQL: " . $mysqli->error);
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Treinos</title>
    <link rel="stylesheet" href="css/consultar_alunos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="logo1.png" type="img">    

</head>

<body>
<div class="container">

<div class="modal fade" id="visTreinoModal" tabindex="-1" aria-labelledby="visTreinoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visTreinoModalLabel">Informações do treino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="msgAlertaErroVis"></span>
                    <dl class="row">
                        <dt class="form-label">ID</dt>
                        <dd class="form-control"><span id="idTreino"></span></dd>

                        <dt class="form-label">Treino</dt>
                        <dd class="form-control"><span id="treinoTreino"></span></dd>

                        <dt class="form-label">Exercicio</dt>
                        <dd class="form-control"><span id="exercicioTreino"></span></dd>

                        <dt class="form-label">Séries</dt>
                        <dd class="form-control"><span id="seriesTreino"></span></dd>

                        <dt class="form-label">Repetições</dt>
                        <dd class="form-control"><span id="repeticoesTreino"></span></dd>

                        <dt class="form-label">Observação</dt>
                        <dd class="form-control"><span id="obsTreino"></span></dd>

                        <dt class="form-label">Criado por</dt>
                        <dd class="form-control"><span id="criacaoTreino"></span></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                        </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editTreinoModal" tabindex="-1" aria-labelledby="editTreinoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTreinoModalLabel">Editar treino</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-Treino-form">
                    <span id="msgAlertaErroEdit"></span>
                        <span id="msgAlertaErroEdit"></span>

                        <input type="hidden" name="id" id="editidTreino">
                        <input type="hidden" name="treino" id="edittreinoTreino">

                        <div class="mb-3">
                            <label for="exercicio" class="col-form-label">Exercicio:</label>
                            <input type="text" name="exercicio" class="form-control" id="editexercicioTreino">
                        </div>
                        <div class="mb-3">
                            <label for="series" class="col-form-label">Séries:</label>
                            <input type="text" name="series" class="form-control" id="editseriesTreino">
                        </div>
                        <div class="mb-3">
                            <label for="repeticoes" class="col-form-label">Repetições:</label>
                            <input type="text" name="repeticoes" class="form-control" id="editrepeticoesTreino">
                        </div>
                        <div class="mb-3">
                            <label for="obs" class="col-form-label">Observação:</label>
                            <input type="text" name="obs" class="form-control" id="editobsTreino">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" class="btn btn-outline-warning btn-sm" id="edit-Treino-btn" value="Salvar" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="boas-vindas">
        <span>Consultar treinos</span><br>
        <span>Treinos cadastrados:</span>
    </div>

    <span id="msgAlerta"></span>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <form method="GET" id="pesquisar-form">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Treino ou <br>Exercício</span>
                    <input id="pesquisa" type="text" class="form-control" placeholder="Treino ou exercício" name="pesquisa"> 
                    <button class="btn btn-secondary" type="submit">Pesquisar</button>
                </div>
                </form>
                <table class="table table-striped">
                <span id="msgAlertaErroEdit"></span>
                        <thead>
                            <tr>
                                <th style="text-align: center; display:none">ID</th>
                                <th style="text-align: center;">Treino</th>
                                <th style="text-align: center;">Exercicio</th>
                                <th style="text-align: center;">Séries</th>
                                <th style="text-align: center;">Repetições</th>
                                <th style="text-align: center;">Observação</th>
                                <th style="text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <?php while($dado_treino = $result_treinos->fetch_array()){ ?>
                            <tr>
                                <td><?php echo $dado_treino['treino']; ?></td>
                                <td><?php echo $dado_treino['exercicio']; ?></td>
                                <td><?php echo $dado_treino['qtd_series']; ?></td>
                                <td><?php echo $dado_treino['qtd_repeticoes']; ?></td>
                                <td><?php echo $dado_treino['obs']; ?></td>
                                <td>
                                    <button id='<?php echo $dado_treino['id'] ?>' class='btn btn-outline-primary btn-sm' onclick="visTreino(<?php echo $dado_treino['id']?>)">Visualizar</button>
                                    <button id=<?php echo $dado_treino['id'] ?> class='btn btn-outline-warning btn-sm' onclick="editTreino(<?php echo $dado_treino['id']?>)">Editar</button>
                                    <button id=<?php echo $dado_treino['id'] ?> class='btn btn-outline-danger btn-sm' onclick="apagarTreino(<?php echo $dado_treino['id']?>)">Apagar</button>
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
    <script src="js/custom1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>