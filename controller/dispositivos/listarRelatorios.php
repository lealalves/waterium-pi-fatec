<?php
require_once("../conexao.php");

$conexao = novaConexao();

try {
  $consulta;
  if (isset($_GET['dcod'])) {
    $id_dispositivo = $_GET['dcod'];
    $consulta = $conexao->prepare("SELECT u.cpf, u.nome, d.*, r.* 
                                   FROM usuario u
                                   JOIN dispositivo d ON u.id_conta = d.id_conta
                                   JOIN relatorio r ON r.codigo_dispositivo = d.codigo_dispositivo
                                   WHERE d.codigo_dispositivo = :id_dispositivo");
    $consulta->bindParam(':id_dispositivo', $id_dispositivo, PDO::PARAM_INT);
  } else {
    $consulta = $conexao->prepare("SELECT u.cpf, u.nome, d.*, r.* 
                                   FROM usuario u
                                   JOIN dispositivo d ON u.id_conta = d.id_conta
                                   JOIN relatorio r ON r.codigo_dispositivo = d.codigo_dispositivo");
  }

  $consulta->execute();
  $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($result);

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>