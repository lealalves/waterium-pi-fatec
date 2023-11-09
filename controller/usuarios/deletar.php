<?php
require_once("../conexao.php");

$id = $_GET["id"];

$conexao = novaConexao();

$deleteQuery = "DELETE FROM usuario WHERE id_conta = $id";

try {
  $result = $conexao->query($deleteQuery);

  if ($result->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Usuário deletado com sucesso"));
  } else {
    echo json_encode(array("erro" => "Erro ao deletar usuário"));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>