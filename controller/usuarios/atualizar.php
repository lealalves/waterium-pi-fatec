<?php
require_once("../conexao.php");

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];

$conexao = novaConexao();

try {
  $updateQuery = $conexao->prepare("UPDATE usuario SET nome = :nome WHERE cpf = :cpf");
  $updateQuery->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $updateQuery->bindParam(':nome', $nome, PDO::PARAM_STR);
  $updateQuery->execute();

  if ($updateQuery->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Nome atualizado com sucesso."));
  } else {
    echo json_encode("Erro ao atualizar nome de usuário.");
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}



?>