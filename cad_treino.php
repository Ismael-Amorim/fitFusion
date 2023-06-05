<?php
session_start(); 
//cadastrar professor
//limpar o buffer de saída
ob_start();

//incluir conexao com banco de dados

include_once "conexao.php";

//cadastrar treino

$dados_treino = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$nome = $_SESSION['name'];

//var_dump($dados_treino);

foreach($dados_treino['treino'] as $chave => $treino);

//verificar se clicou no botao
if(!empty($dados_treino['cadTreino'])){
   foreach($dados_treino['exercicio'] as $chave => $exercicio){
    /*echo "Chave: $chave <br>";
    echo "Treino: $treino <br>";
    echo "Exercicio: $exercicio <br>";
    echo "Séries: " . $dados_treino['series'][$chave] . "<br>";
    echo "Repetições: " . $dados_treino['repeticoes'][$chave] . "<br>";
    echo "<hr>";
    */
    $query_treinos = "INSERT INTO treino (treino, exercicio, qtd_series, qtd_repeticoes, chave, obs, criacao)
                            VALUE (:treino, :exercicio, :series, :repeticoes, :chave, :obs, '$nome')";
    $cad_treinos = $conn->prepare($query_treinos);
    $cad_treinos->bindParam(':treino', $treino);
    $cad_treinos->bindParam(':exercicio', $exercicio);
    $cad_treinos->bindParam(':series', $dados_treino['series'][$chave]);
    $cad_treinos->bindParam(':repeticoes', $dados_treino['repeticoes'][$chave]);
    $cad_treinos->bindParam(':obs', $dados_treino['obs'][$chave]);
    $cad_treinos->bindParam(':chave', $chave);
    $cad_treinos->execute();
   }

   $_SESSION['msg'] = "<p style='color: green;'>Treino cadastrado com sucesso! </p>";
  header("Location: cadastro-treino.php");
}else{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Treino não cadastrado com sucesso! </p>";
   // header("Location: cadastro-treino.php");
}