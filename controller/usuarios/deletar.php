<?php
require_once("../conexao.php");

$cpf = (int) $_GET["cpf"];

$conexao = novaConexao();

$deleteQuery = "DELETE FROM usuario WHERE cpf=?";

try {
  $result = $conexao->prepare($deleteQuery);
  $result->execute([$cpf]);

  if ($result->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Usuário deletado com sucesso"));
  } else {
    echo json_encode(array("erro" => "Erro ao deletar usuario"));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>