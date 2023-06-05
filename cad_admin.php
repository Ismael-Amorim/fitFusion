<?php
session_start(); 
//cadastrar professor
//limpar o buffer de saída
ob_start();

//incluir conexao com banco de dados

include_once "conexao.php";

//receber dados do formulário
$dados_prof = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//var_dump($dados_prof);


//verificar se o usuário clicou no botão
if(!empty($dados_prof['cadProf'])){

//cadastrar usuario
    $query_cadastro="INSERT INTO cadastro
                (nome, cpf, senha, nivel) VALUES
                (:nome, :cpf, :senha, :nivel)";
    
    $cad_usuario = $conn->prepare($query_cadastro);
    $cad_usuario->bindParam(':nome', $dados_prof['nome'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':cpf', $dados_prof['cpf'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':senha', $dados_prof['senha'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':nivel', $dados_prof['nivel'], PDO::PARAM_STR);

    $cad_usuario->execute();
    //var_dump($conn->lastInsertId());
    //recuperar o ultimo inserido
    $usuario_id = $conn->lastInsertId();

    //mensagem de sucesso
    $_SESSION['msg'] = "<p style='color: green;>Usuário cadastrado com sucesso!</p>";

    //redirecionar o usuário
    header("Location: cadastro-admin.php");
}else{
       //mensagem de erro
       $_SESSION['msg'] = "<p style='color: #f00;>Erro: Usuário não cadastrado com sucesso!</p>";

       //redirecionar o usuário
       //header("Location: cadastro-admin.php");
};