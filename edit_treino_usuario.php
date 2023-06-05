<?php
include_once("conexao.php");

$query_usuarios = "SELECT id, nome, cpf, seg, ter, qua, qui, sex, sab FROM cadastro WHERE nivel ='Aluno' ORDER BY nome ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();
$dados="";
 while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
       extract($row_usuario);
        $dados .= "<table><tr>
                      <td>$id</td>
                      <td>$nome</td>
                      <td>$cpf</td>
                      <td>
                      <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visUsuario($id)'>Visualizar</button>
                      </td>
                    </table></tr>";
            }
          
            echo $dados;
