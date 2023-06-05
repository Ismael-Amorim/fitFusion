<?php
include_once("conexao.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

  $query_usuario = "DELETE FROM treino WHERE id=:id";
  $result_usuario = $conn->prepare($query_usuario);
  $result_usuario->bindParam(':id', $id);

  $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

  if($result_usuario->execute()){
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Exercício apagado com sucesso!</div>"];
  }else{
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Exercício não apagado com sucesso!</div>"];
  }
}else{
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum exercício encontrado!</div>"];
}

echo json_encode($retorna);