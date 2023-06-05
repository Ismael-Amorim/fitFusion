<?php
include_once("conexao.php");

$query_usuarios = "SELECT * FROM treino ORDER BY treino ASC";
$result_usuarios = $conn->prepare($query_usuarios);
$result_usuarios->execute();
$dados="";
 while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
       extract($row_usuario);
        $dados .= "<table><tr>
                      <td style='text-align: center; display:none'>$id</td>
                      <td>$treino</td>
                      <td>$exercicio</td>
                      <td>$qtd_series </td>
                      <td>$qtd_repeticoes</td>
                      <td>$obs</td>
                      <td>
                      <button id='$id' class='btn btn-outline-primary btn-sm' onclick='visTreino($id)'>Visualizar</button>
                      <button id='$id' class='btn btn-outline-warning btn-sm' onclick='editTreino($id)'>Editar</button>
                      <button id='$id' class='btn btn-outline-danger btn-sm' onclick='apagarTreino($id)'>Apagar</button></td>
                    </table></tr>";
            }
          
            echo $dados;
