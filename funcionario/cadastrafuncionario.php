<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$senhahash = $_POST["senhahash"] ?? "";
$estadocivil = $_POST["estadocivil"] ?? "";
$datanascimento = $_POST["datanascimento"] ?? "";
$funcao = $_POST["funcao"] ?? "";

$hashsenha = password_hash($senhahash, PASSWORD_DEFAULT);

try {
  $sql = <<<SQL
  INSERT INTO funcionario (nome, email, senhaHash, estadoCivil, dataNascimento, funcao)
    VALUES (?, ?, ?, ?, ?, ?)
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $nome, $email, $hashsenha,
    $estadocivil, $datanascimento, $funcao
  ]);

  header("location: listafuncionario.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
