<?php
require_once("../conexao.php");

$conexao = novaConexao();

$cpf = $_POST['cpf'];

$firstSelect = "SELECT * 
                  FROM usuario
                  WHERE cpf = $cpf";

try {
  $consulta = $conexao->query($firstSelect);
  if ($consulta->rowCount() > 0) {
    $result1 = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $secondSelect = "SELECT d.* 
                  FROM usuario u
                  JOIN dispositivo d 
                  ON u.id_conta = d.id_conta
                  WHERE cpf = $cpf";

    $consulta2 = $conexao->query($secondSelect);
    if ($consulta2->rowCount() > 0) {
      $result2 = $consulta2->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($result1[0] + Array("dispositivos" => $result2));
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