<?php
require_once("../conexao.php");

$conexao = novaConexao();

$querySelect = "SELECT u.id_conta as conta, u.cpf, u.nome, d.* 
                  FROM usuario u
                  LEFT JOIN dispositivo d 
                  ON u.id_conta = d.id_conta";

try {

  $result = $conexao->query($querySelect)->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>