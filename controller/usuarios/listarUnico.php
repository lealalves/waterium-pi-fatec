<?php
require_once("../conexao.php");

$conexao = novaConexao();

$cpf = $_POST['cpf'];

$firstSelect = "SELECT u.cpf, u.nome, d.* 
                  FROM usuario u
                  JOIN dispositivo d 
                  ON u.id_conta = d.id_conta
                  WHERE cpf = $cpf";

$secondSelect = "SELECT * 
                  FROM usuario
                  WHERE cpf = $cpf";

try {
  $result = $conexao->query($firstSelect);
  if ($result->rowCount() > 0) {
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
  } else {
    $result = $conexao->query($secondSelect);
    if ($result->rowCount() > 0) {
      $result = $result->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result);
    } else {
      echo json_encode(array("error" => "CPF nao encontrado."));
    }
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>