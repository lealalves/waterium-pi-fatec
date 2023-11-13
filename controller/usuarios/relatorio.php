<?php
require_once("../conexao.php");

$conexao = novaConexao();

$cpf = $_POST['cpf'];

try {
  $firstSelect = $conexao->prepare("SELECT u.cpf, u.nome, d.*, r.* 
                                    FROM usuario u
                                    JOIN dispositivo d 
                                    ON u.id_conta = d.id_conta
                                    join relatorio r 
                                    on r.codigo_dispositivo = d.codigo_dispositivo
                                    where u.cpf = :cpf");
  $firstSelect->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $firstSelect->execute();

  if ($firstSelect->rowCount() > 0) {
    $result = $firstSelect->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

  } else {
    echo json_encode(array("error" => "CPF nao encontrado."));
  }

} catch (PDOException $e) {
  echo json_encode($e->getMessage());
  exit;
}

?>