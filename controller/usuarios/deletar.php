<?php
require_once("../conexao.php");

$cpf = $_GET["cpf"];

$conexao = novaConexao();

try {
  $deleteQuery = $conexao->prepare("DELETE FROM usuario WHERE cpf = :cpf");
  $deleteQuery->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $deleteQuery->execute();

  if ($deleteQuery->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Usuário deletado com sucesso"));
  } else {
    echo json_encode(array("erro" => "Erro ao deletar usuario"));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>