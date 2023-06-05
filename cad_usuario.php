<?php
session_start(); 
//limpar o buffer de saída
ob_start();

//incluir conexao com banco de dados

include_once "conexao.php";

//receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$nome = $_SESSION['name'];
//var_dump($dados);


//verificar se o usuário clicou no botão
if(!empty($dados['cadUsuario'])){

//cadastrar usuario

    $query_cadastro="INSERT INTO cadastro
                (nome, cpf, senha, idade, estatura, peso, objetivo, professor, anamnese, torax, abdomen, cintura, braco_dir, braco_esq, coxa_dir, coxa_esq, quadril, ombro, triceps, abd, iliaca, subs, coxa, gordura_total, prox_reavaliacao, seg, ter, qua, qui, sex, sab, cadastro, criacao) VALUES
                (:nome, :cpf, :senha, :idade, :estatura, :peso, :objetivo, :professor, :anamnese, :torax, :abdomen, :cintura, :braco_dir, :braco_esq, :coxa_dir, :coxa_esq, :quadril, :ombro, :triceps, :abd, :iliaca, :subs, :coxa, :gordura_total, :prox_reavaliacao, :seg, :ter, :qua, :qui, :sex, :sab, NOW(), '$nome')";
    
    $cad_usuario = $conn->prepare($query_cadastro);
    $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':idade', $dados['idade'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':estatura', $dados['estatura'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':peso', $dados['peso'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':objetivo', $dados['objetivo'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':professor', $dados['professor'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':anamnese', $dados['anamnese'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':torax', $dados['torax'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':abdomen', $dados['abdomen'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':cintura', $dados['cintura'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':braco_dir', $dados['braco_dir'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':braco_esq', $dados['braco_esq'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':coxa_dir', $dados['coxa_dir'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':coxa_esq', $dados['coxa_esq'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':quadril', $dados['quadril'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':ombro', $dados['ombro'], PDO::PARAM_STR);    
    $cad_usuario->bindParam(':triceps', $dados['triceps'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':abd', $dados['abd'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':iliaca', $dados['iliaca'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':subs', $dados['subs'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':coxa', $dados['coxa'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':gordura_total', $dados['gordura_total'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':prox_reavaliacao', $dados['prox_reavaliacao'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':seg', $dados['seg'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':ter', $dados['ter'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':qua', $dados['qua'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':qui', $dados['qui'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':sex', $dados['sex'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':sab', $dados['sab'], PDO::PARAM_STR);
    $cad_usuario->execute();
    //var_dump($conn->lastInsertId());

    //cadastrar avaliações
    $query_avaliacoes="INSERT INTO avaliacoes
    (nome, cpf, idade, estatura, peso, objetivo, professor, anamnese, torax, abdomen, cintura, braco_dir, braco_esq, coxa_dir, coxa_esq, quadril, ombro, triceps, abd, iliaca, subs, coxa, gordura_total, prox_reavaliacao, cadastro, criacao) VALUES
    (:nome, :cpf, :idade, :estatura, :peso, :objetivo, :professor, :anamnese, :torax, :abdomen, :cintura, :braco_dir, :braco_esq, :coxa_dir, :coxa_esq, :quadril, :ombro, :triceps, :abd, :iliaca, :subs, :coxa, :gordura_total, :prox_reavaliacao, NOW(), '$nome')";

$cad_avaliacoes = $conn->prepare($query_avaliacoes);
$cad_avaliacoes->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':idade', $dados['idade'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':estatura', $dados['estatura'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':peso', $dados['peso'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':objetivo', $dados['objetivo'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':professor', $dados['professor'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':anamnese', $dados['anamnese'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':torax', $dados['torax'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':abdomen', $dados['abdomen'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':cintura', $dados['cintura'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':braco_dir', $dados['braco_dir'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':braco_esq', $dados['braco_esq'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':coxa_dir', $dados['coxa_dir'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':coxa_esq', $dados['coxa_esq'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':quadril', $dados['quadril'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':ombro', $dados['ombro'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':triceps', $dados['triceps'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':abd', $dados['abd'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':iliaca', $dados['iliaca'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':subs', $dados['subs'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':coxa', $dados['coxa'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':gordura_total', $dados['gordura_total'], PDO::PARAM_STR);
$cad_avaliacoes->bindParam(':prox_reavaliacao', $dados['prox_reavaliacao'], PDO::PARAM_STR);
$cad_avaliacoes->execute();


    //mensagem de sucesso
    $_SESSION['msg'] = "<p style='color: green;>Usuário cadastrado com sucesso!</p>";

    //redirecionar o usuário
   header("Location: cadastro-aluno.php");
}else{
       //mensagem de erro
       $_SESSION['msg'] = "<p style='color: #f00;>Erro: Usuário não cadastrado com sucesso!</p>";

       //redirecionar o usuário
      // header("Location: cadastro-aluno.php");
};