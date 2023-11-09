<?php 
require_once("../conexao.php");

$conexao = novaConexao();

$cpf = $_POST['cpf'];

$querySelect = "SELECT u.cpf, u.nome, d.* 
                  FROM usuario u
                  JOIN dispositivo d 
                  ON u.id_conta = d.id_conta
                  WHERE cpf = $cpf";

$result = $conexao->query($querySelect);
if($result->rowCount() > 0){
  $result = $result->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);
} else {
  echo json_encode(array("error" => "CPF nao encontrado."));
}

?>