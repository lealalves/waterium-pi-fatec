<?php
require_once("../conexao.php");

$id = (int) $_GET["id"];

$conexao = novaConexao();

$deleteQuery = "DELETE FROM usuario WHERE id_conta=?";

try {
  $result = $conexao->prepare($deleteQuery);
  $result->execute([$id]);

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