<?php
require_once("../conexao.php");

$conexao = novaConexao();

$querySelect = "SELECT u.cpf, u.nome, d.*, r.* 
                FROM usuario u
                JOIN dispositivo d 
                ON u.id_conta = d.id_conta
                join relatorio r 
                on r.codigo_dispositivo = d.codigo_dispositivo";

try {

  $result = $conexao->query($querySelect)->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($result);

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>