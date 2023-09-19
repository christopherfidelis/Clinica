<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

// Dados paciente
$nome = $_GET["nome"] ?? "";
$sexo = $_GET["sexo"] ?? "";
$email = $_GET["email"] ?? "";
$telefone = $_GET["telefone"] ?? "";

// Dados consulta
$dataHora = $_GET["especialidade"] ?? "";
$medico = $_GET["medico"] ?? "";
$dataHora = $_GET["datetime"] ?? "";

$sql1 = <<<SQL
  INSERT INTO paciente (nome, sexo, email, telefone)
  VALUES (?, ?, ?, ?)
  SQL;

$sql2 = <<<SQL
  INSERT INTO agendamento (DataHora, id_medico, id_paciente)
  VALUES (?, ?, ?)
  SQL;

try {
  $pdo->beginTransaction();

  $stmt1 = $pdo->prepare($sql1);
  if (!$stmt1->execute([
    $nome, $sexo, $email, $telefone
  ])) throw new Exception('Falha na primeira inserção');


  $idNovoPaciente = $pdo->lastInsertId();
  $stmt2 = $pdo->prepare($sql2);
  if (!$stmt2->execute([
    $dataHora, $medico, $idNovoPaciente
  ])) throw new Exception('Falha na segunda inserção');

  // Efetiva as operações
  $pdo->commit();

  header("location: ../index.html");
  exit();
} 
catch (Exception $e) {
  $pdo->rollBack();
  if ($e->errorInfo[1] === 1062)
    exit('Dados duplicados: ' . $e->getMessage());
  else
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
