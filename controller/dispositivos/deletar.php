<?php
require_once("../conexao.php");

$codigo_dispositivo = (int) $_GET["codigo_dispositivo"];

$conexao = novaConexao();

$firstDelete = "DELETE FROM relatorio
WHERE codigo_dispositivo = ?";

$secondDelete = "DELETE FROM dispositivo
WHERE codigo_dispositivo = ?;";

try {
  $result = $conexao->prepare($firstDelete);
  $result->execute([$codigo_dispositivo]);

  $result = $conexao->prepare($secondDelete);
  $result->execute([$codigo_dispositivo]);

  if ($result->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Dispositivo deletado com sucesso"));
  } else {
    echo json_encode(array("erro" => "Erro ao deletar dispositivo"));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>