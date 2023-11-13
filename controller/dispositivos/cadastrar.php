<?php
require_once("../conexao.php");

$dcod = $_POST["dcod"];
$userId = $_POST["userId"];

echo $dcod;
$conexao = novaConexao();

try {
  $cadastrarQuery = $conexao->prepare("INSERT INTO dispositivo(id_conta, codigo_dispositivo) VALUES
                                      (:userId, :dcod)
                                      ");
  $cadastrarQuery->bindParam(':dcod', $dcod, PDO::PARAM_STR);
  $cadastrarQuery->bindParam(':userId', $userId, PDO::PARAM_STR);
  $cadastrarQuery->execute();

  if ($cadastrarQuery->rowCount() > 0) {
    echo json_encode(array("mensagem" => "Dispositivo cadastrado com sucesso."));
  } else {
    echo json_encode("Erro cadastrar dispositivo.");
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}



?>