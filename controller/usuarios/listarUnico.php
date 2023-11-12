<?php
require_once("../conexao.php");

$conexao = novaConexao();

$cpf = $_POST['cpf'];

try {
  $firstSelect = $conexao->prepare("SELECT * FROM usuario WHERE cpf = :cpf");
  $firstSelect->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $firstSelect->execute();

  if ($firstSelect->rowCount() > 0) {
    $result1 = $firstSelect->fetchAll(PDO::FETCH_ASSOC);

    $secondSelect = $conexao->prepare("SELECT d.* 
                      FROM usuario u
                      JOIN dispositivo d 
                      ON u.id_conta = d.id_conta
                      WHERE cpf = :cpf");
    $secondSelect->bindParam(":cpf", $cpf, PDO::PARAM_STR);
    $secondSelect->execute();
    if ($secondSelect->rowCount() > 0) {
      $result2 = $secondSelect->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result1[0] + array("dispositivos" => $result2));
    } else {
      echo json_encode($result1[0]);
    }

  } else {
    echo json_encode(array("error" => "CPF nao encontrado."));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>