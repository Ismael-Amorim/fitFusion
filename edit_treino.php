<?php

include_once "conexao.php";



if (empty($_GET['seg'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Segunda feira!</div>"];
} elseif (empty($_GET['ter'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Terça feira!</div>"];
} elseif (empty($_GET['qua'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Quarta feira!</div>"];
} elseif (empty($_GET['qui'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Quinta feira!</div>"];
} elseif (empty($_GET['sex'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Sexta feira!</div>"];
} elseif (empty($_GET['sab'])) {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário preencher o campo Sábado!</div>"];
} 
else {
    $query_usuario= "UPDATE cadastro SET nome=$_GET[nome], seg=$_GET[seg], ter=$_GET[ter], qua=:$_GET[qua], qui=$_GET[qui], sex=$_GET[sex], sab=$_GET[sab] WHERE nome=$_GET[nome]";
    
    $edit_usuario = $conn->prepare($query_usuario);

    if ($edit_usuario->execute()) {
        $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Usuário editado com sucesso!</div>"];
    } else {
        $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Usuário não editado com sucesso!</div>"];
    }
}

echo json_encode($retorna);