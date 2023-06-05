<?php
/*
include_once "conexao.php";

$dados_login = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados_login['cpf'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='msgAlertErroLogin'>Erro: Necessário preencher o campo usuário!</div>"];
}elseif(empty($dados_login['senha'])){
    $retorna = ['erro'=> true, 'msg' => "<div class='msgAlertErroLogin'>Erro: Necessário preencher o campo senha!</div>"];
}
else{
    $query_login = "SELECT cpf, senha
    FROM cadastro
    WHERE cpf = :cpf
    LIMIT 1";

    $result_login = $conn->prepare($query_login);
    $result_login->bindParam(':cpf', $dados_login['cpf'], PDO::PARAM_STR);
    $result_login->execute();

    if(($result_login) and ($result_login->rowCount() != 0)){
        $row_usuario = $result_login->fetch(PDO::FETCH_ASSOC);
        $retorna = ['erro'=> false, 'msg' => "<div class='msgAlertErroLogin'>Validar!</div>"];
    }else{
        $retorna = ['erro'=> true, 'msg' => "<div class='msgAlertErroLogin'>Erro: CPF ou senha inválida!</div>"];
    }
    
}

echo json_encode($retorna);
*/

