<?php
session_start(); 
//limpar o buffer de saída
ob_start();

$nome = $_SESSION['name'];
include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (empty($dados['id'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Tente mais tarde!</div>"];
}else {
    $query_ficha= "UPDATE cadastro SET nome=:nome, estatura=:estatura, peso=:peso, objetivo=:objetivo,  professor=:professor, anamnese=:anamnese, torax=:torax, abdomen=:abdomen, cintura=:cintura, braco_dir=:braco_dir, braco_esq=:braco_esq, coxa_dir=:coxa_dir, coxa_esq=:coxa_esq, quadril=:quadril, ombro=:ombro,  triceps=:triceps, abd=:abd,  iliaca=:iliaca, subs=:subs, coxa=:coxa, gordura_total=:gordura_total, prox_reavaliacao=:prox_reavaliacao, edicao='$nome' WHERE id=:id";
    
    $edit_ficha = $conn->prepare($query_ficha);
    $edit_ficha->bindParam(':id', $dados['id']);
    $edit_ficha->bindParam(':nome', $dados['nome']);
    $edit_ficha->bindParam(':estatura', $dados['estatura']);
    $edit_ficha->bindParam(':peso', $dados['peso']);
    $edit_ficha->bindParam(':objetivo', $dados['objetivo']);
    $edit_ficha->bindParam(':professor', $dados['professor']);
    $edit_ficha->bindParam(':anamnese', $dados['anamnese']);
    $edit_ficha->bindParam(':torax', $dados['torax']);
    $edit_ficha->bindParam(':abdomen', $dados['abdomen']);
    $edit_ficha->bindParam(':cintura', $dados['cintura']);
    $edit_ficha->bindParam(':braco_dir', $dados['braco_dir']);
    $edit_ficha->bindParam(':braco_esq', $dados['braco_esq']);
    $edit_ficha->bindParam(':coxa_dir', $dados['coxa_dir']);
    $edit_ficha->bindParam(':coxa_esq', $dados['coxa_esq']);
    $edit_ficha->bindParam(':quadril', $dados['quadril']);
$edit_ficha->bindParam(':ombro', $dados['ombro']);
    $edit_ficha->bindParam(':triceps', $dados['triceps']);
    $edit_ficha->bindParam(':abd', $dados['abd']);
    $edit_ficha->bindParam(':iliaca', $dados['iliaca']);
    $edit_ficha->bindParam(':subs', $dados['subs']);
    $edit_ficha->bindParam(':coxa', $dados['coxa']);
    $edit_ficha->bindParam(':gordura_total', $dados['gordura_total']);
    $edit_ficha->bindParam(':prox_reavaliacao', $dados['prox_reavaliacao']);

    $query_cad_ficha= "INSERT INTO avaliacoes
    (nome, cpf, estatura, peso, objetivo, idade, professor, anamnese, torax, abdomen, cintura, braco_dir, braco_esq, coxa_dir, coxa_esq, quadril, ombro, triceps, abd, iliaca, subs, coxa, gordura_total, prox_reavaliacao, cadastro, criacao) VALUES
    (:nome, :cpf, :estatura, :peso, :objetivo, :idade, :professor, :anamnese, :torax, :abdomen, :cintura, :braco_dir, :braco_esq, :coxa_dir, :coxa_esq, :quadril, :ombro, :triceps, :abd, :iliaca, :subs, :coxa, :gordura_total, :prox_reavaliacao, NOW(), '$nome')";
    
    $cad_ficha = $conn->prepare($query_cad_ficha);
    $cad_ficha->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':estatura', $dados['estatura'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':idade', $dados['idade'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':peso', $dados['peso'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':objetivo', $dados['objetivo'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':professor', $dados['professor'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':anamnese', $dados['anamnese'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':torax', $dados['torax'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':abdomen', $dados['abdomen'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':cintura', $dados['cintura'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':braco_dir', $dados['braco_dir'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':braco_esq', $dados['braco_esq'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':coxa_dir', $dados['coxa_dir'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':coxa_esq', $dados['coxa_esq'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':quadril', $dados['quadril'], PDO::PARAM_STR);
$cad_ficha->bindParam(':ombro', $dados['ombro'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':triceps', $dados['triceps'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':abd', $dados['abd'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':iliaca', $dados['iliaca'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':subs', $dados['subs'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':coxa', $dados['coxa'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':gordura_total', $dados['gordura_total'], PDO::PARAM_STR);
    $cad_ficha->bindParam(':prox_reavaliacao', $dados['prox_reavaliacao'], PDO::PARAM_STR);
    $cad_ficha->execute();
    
    if ($edit_ficha->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Ficha editada com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Ficha não editada com sucesso!</div>"];
    }
}

echo json_encode($retorna);