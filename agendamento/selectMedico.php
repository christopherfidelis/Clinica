<?php
include ("conexao.php");

$especialidade= $_GET['especialidade'];

$sql = <<<SQL
  SELECT id, nome
    FROM medico
    WHERE especialidade = ?
  SQL;

$stmt = $conn->prepare($sql);
$stmt->execute([$especialidade]);

$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo '<option value="" select>Selecione um médico</option>';

foreach($registros as $option) {
?>
    <option value="<?php echo $option['id']?>" <?php echo $check; ?>><?php echo $option['nome']?></option>
<?php
}
?>