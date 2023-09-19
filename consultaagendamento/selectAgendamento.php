<?php
require "../conexaoMySQL.php";
$pdo = mysqlConnect();

$email = $_GET['email'];

$sql = <<<SQL
  SELECT DataHora, m.nome as medico, m.especialidade FROM agendamento a
    inner join paciente p on a.id_paciente=p.id
    inner join medico m on a.id_medico=m.id
    WHERE email = ?
  SQL;

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$registros = $stmt->fetch();

if ($registros != '') {
    $especialidade = $registros["especialidade"];
    $medico = $registros["medico"];
    $data = new DateTime($registros["DataHora"]);
    $dataFormatoDiaMesAno = $data->format('d-m-Y');
    $hora = $data->format('H:i:s');
    echo ("<img src='/Imagem/check.png' alt='check' id='logo' width=50 height=50><p style='color: green'>Seu agendamento na especialidade $especialidade com o(a) médico(a) $medico está agendado para $dataFormatoDiaMesAno às $hora</p>");
}
else {
    echo ("<img src='/Imagem/x.png' alt='x' id='logo' width=50 height=50><p style='color: red;'>Você não tem nenhum agendamento cadastrado!</p>");
}


