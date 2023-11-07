<?php 
require_once("conexao.php");

$nome = $_POST["nome"];
$cpf = (int)$_POST["cpf"];

$conexao = novaConexao();

$queryTest = "SELECT * FROM usuario WHERE cpf = $cpf";

$resultTest = $conexao->prepare($queryTest);
$resultTest->execute();

$numRows = $resultTest->rowCount();

if ($numRows > 0) {
  echo json_encode("CPF ja cadastrado.");;
} else {
  
  $insert = "INSERT INTO usuario (cpf, nome) VALUES
            ('$cpf', '$nome')";
    
  if($conexao-> exec($insert)){
    echo json_encode("Usuario cadastrado com sucesso.");
  
  } else{
    echo json_encode($conexao->errorCode());
  }
  
}

?>