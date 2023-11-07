<?php
function novaConexao(){
  $servidor = '127.0.0.1:3306';

  $usuario = 'root';

  $senha = '';

  $banco = 'waterium';

  try {

    $conexao = new PDO("mysql:host=$servidor;dbname=".$banco, $usuario, $senha);

    return $conexao;

  } catch (PDOException $e) {
    echo 'Erro: '.$e->getMessage();
    exit;
  } 

} 

?>