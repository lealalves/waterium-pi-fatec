<?php
require_once("../conexao.php");

$conexao = novaConexao();

$querySelect = "SELECT *
                FROM dispositivo";

try {

  $result = $conexao->query($querySelect)->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>