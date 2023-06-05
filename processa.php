<?php
/*
session_start(); 

//cadastrar aluno
//limpar o buffer de saída
ob_start();

//incluir conexao com banco de dados

include_once "conexao.php";

//receber dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//var_dump($dados);


//verificar se o usuário clicou no botão
if(!empty($dados['cadUsuario'])){

//cadastrar usuario
    $query_cadastro="INSERT INTO cadastro
                (nome, cpf, senha, nivel, idade, estatura, peso, objetivo, professor, anamnese, torax, abdomen, cintura, braco_dir, braco_esq, coxa_dir, coxa_esq, quadril, triceps, abd, iliaca, subs, coxa, gordura_total, prox_reavaliacao) VALUES
                (:nome, :cpf, :senha, :nivel, :idade, :estatura, :peso, :objetivo, :professor, :anamnese, :torax, :abdomen, :cintura, :braco_dir, :braco_esq, :coxa_dir, :coxa_esq, :quadril, :triceps, :abd, :iliaca, :subs, :coxa, :gordura_total, :prox_reavaliacao)";
    
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
    $cad_usuario->bindParam(':triceps', $dados['triceps'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':abd', $dados['abd'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':iliaca', $dados['iliaca'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':subs', $dados['subs'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':coxa', $dados['coxa'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':gordura_total', $dados['gordura_total'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':prox_reavaliacao', $dados['prox_reavaliacao'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
    $cad_usuario->bindParam(':nivel', $dados['nivel'], PDO::PARAM_STR);

    $cad_usuario->execute();
    //var_dump($conn->lastInsertId());
    //recuperar o ultimo inserido
    $usuario_id = $conn->lastInsertId();

    $query_treino = "INSERT INTO treinoUsuarios
                    (seg, ter, qua, qui, sex, sab, usuario_id) VALUES
                    (:seg, :ter, :qua, :qui, :sex, :sab, :usuario_id)";

    $cad_treino = $conn->prepare($query_treino);
    $cad_treino->bindParam(':seg', $dados['seg'], PDO::PARAM_STR);
    $cad_treino->bindParam(':ter', $dados['ter'], PDO::PARAM_STR);
    $cad_treino->bindParam(':qua', $dados['qua'], PDO::PARAM_STR);
    $cad_treino->bindParam(':qui', $dados['qui'], PDO::PARAM_STR);
    $cad_treino->bindParam(':sex', $dados['sex'], PDO::PARAM_STR);
    $cad_treino->bindParam(':sab', $dados['sab'], PDO::PARAM_STR);
    $cad_treino->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $cad_treino->execute();

    //mensagem de sucesso
    $_SESSION['msg'] = "<p style='color: green;>Usuário cadastrado com sucesso!</p>";

    //redirecionar o usuário
   // header("Location: cadastro-aluno.php");
}else{
       //mensagem de erro
       $_SESSION['msg'] = "<p style='color: #f00;>Erro: Usuário não cadastrado com sucesso!</p>";

       //redirecionar o usuário
      // header("Location: cadastro-aluno.php");
};

///////////////////////////////////////////////////////////////////////
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
    //header("Location: cadastro-admin.php");
}else{
       //mensagem de erro
       $_SESSION['msg'] = "<p style='color: #f00;>Erro: Usuário não cadastrado com sucesso!</p>";

       //redirecionar o usuário
       //header("Location: cadastro-admin.php");
};

///////////////////////////////////////////////////////////////////////

//cadastrar treino

$dados_treino = filter_input_array(INPUT_POST, FILTER_DEFAULT);

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
    /*
   $query_treinos = "INSERT INTO treino (treino, exercicio, qtd_series, qtd_repeticoes, chave) VALUE (:treino, :exercicio, :series, :repeticoes, :chave)";
    $cad_treinos = $conn->prepare($query_treinos);
    $cad_treinos->bindParam(':treino', $treino);
    $cad_treinos->bindParam(':exercicio', $exercicio);
    $cad_treinos->bindParam(':series', $dados_treino['series'][$chave]);
    $cad_treinos->bindParam(':repeticoes', $dados_treino['repeticoes'][$chave]);
    $cad_treinos->bindParam(':chave', $chave);
    $cad_treinos->execute();
   }

   $_SESSION['msg'] = "<p style='color: green;'>Treino cadastrado com sucesso! </p>";
  // header("Location: cadastro-treino.php");
}else{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Treino não cadastrado com sucesso! </p>";
   // header("Location: cadastro-treino.php");
}

///////////////////////////////////////////////////////////////////
//sistema de login




*/
?>