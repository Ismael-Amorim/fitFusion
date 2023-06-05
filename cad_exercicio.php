<?php
session_start(); 
//cadastrar professor
//limpar o buffer de saída
ob_start();

//incluir conexao com banco de dados

include_once "conexao.php";

//cadastrar treino

$dados_treino = $_POST['treino'];
$dados_exercicio = $_POST['exercicio'];
$dados_series = $_POST['series'];
$dados_repeticoes = $_POST['repeticoes'];
$dados_obs = $_POST['obs'];

var_dump($dados_exercicio);
$nome = $_SESSION['name'];
//var_dump($dados_treino);


//verificar se clicou no botao



   $query_treinos = "INSERT INTO treino (treino, exercicio, qtd_series, qtd_repeticoes, obs, criacao)
                            VALUE ('$dados_treino','$dados_exercicio','$dados_series','$dados_repeticoes','$dados_obs','$nome')";
    $cad_treinos = $conn->prepare($query_treinos);
   
   if($cad_treinos->execute()){
  echo "<p style='color: green;'>Treino cadastrado com sucesso! </p>";
  header("Location: cadastro-exercicio.php");
}else{
    echo "<p style='color: #f00;'>Erro: Treino não cadastrado com sucesso! </p>";
   // header("Location: cadastro-treino.php");
}