<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$especialidade = $_POST["especialidade"] ?? "";
$crm = $_POST["crm"] ?? "";

try {
  $sql = <<<SQL
  INSERT INTO medico (nome, especialidade, crm)
  VALUES (?, ?, ?)
  SQL;


  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $especialidade, $crm]);

  header("location: listamedico.php");
  exit();
} 
catch (Exception $e) {  
  //error_log($e->getMessage(), 3, 'log.php');
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}