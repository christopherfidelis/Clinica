<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$comentario = $_POST["comentario"] ?? "";

try {
  $sql = <<<SQL
    INSERT INTO contato (nome, email, telefone, mensagem)
    VALUES (?, ?, ?, ?)
  SQL;

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $email, $telefone, $comentario]);

  header("location: listacontato.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
