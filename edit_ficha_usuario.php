<?php
include_once("conexao.php");

$query_usuarios = "SELECT * FROM cadastro ORDER BY nome ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();
$dados="";
 while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
       extract($row_usuario);
        $dados .= "<table><tr>
                      <td>$id</td>
                      <td>$cpf</td>
                      <td>$nome</td>
                      <td>
                      <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visUsuario($id)'>Visualizar</button>
                      <button id='$id' class='btn btn-outline-warning btn-sm' onclick='editUsuario($id)'>Editar</button></td>
                    </table></tr>";
            }
          
            echo $dados;
