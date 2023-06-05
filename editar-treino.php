<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (empty($dados['id'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
} elseif (empty($dados['exercicio'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo |Exercicio!</div>"];
} elseif (empty($dados['series'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Series!</div>"];
} elseif (empty($dados['repeticoes'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Repeticoes!</div>"];
} 
else {
    $query_usuario= "UPDATE treino SET exercicio=:editExercicio, qtd_series=:editSeries, qtd_repeticoes=:editRepeticoes, obs=:editObs WHERE id=:id";
    
    $edit_usuario = $conn->prepare($query_usuario);
    $edit_usuario->bindParam(':editExercicio', $dados['exercicio']);
    $edit_usuario->bindParam(':editSeries', $dados['series']);
    $edit_usuario->bindParam(':editRepeticoes', $dados['repeticoes']);
    $edit_usuario->bindParam(':editObs', $dados['obs']);
    $edit_usuario->bindParam(':id', $dados['id']);

    
    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Treino editado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Treino não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);