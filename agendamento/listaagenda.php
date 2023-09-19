<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
  SELECT DataHora, p.nome as paciente, p.sexo, p.email, p.telefone, m.nome as medico, m.especialidade, m.crm
    FROM agendamento a INNER JOIN paciente p
        ON a.id_paciente = p.id INNER JOIN medico m on a.id_medico = m.id
  SQL;

  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consultas Agendadas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="formatacaoagendamento.css"> 
</head>

<body>
    <header>
      <img src="../Imagem/logo.png" alt='logotipo' id="logo" width=130 height=130>
      <h1>Clínica Rede Mais</h1>
    </header>
    
    <nav>
      <ul>
        <li><a href="../index.html">Home</a></li>
        <li><a href="../arearestrita/menu.html">Menu</a></li>
        <li><a href="../galeria/galeria.html">Galeria</a></li>
        <li><a href="../mensagensdecontato/contato.html">Contato</a></li>
        <li><a href="../agendamento/Agendamento.php">Agendamento de Consulta</a></li>
      </ul>
    </nav>

    <main>
      <h3>Consultas Agendadas</h3>
      <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr class="table table-light">
                <th>Data e Hora</th>
                <th>Paciente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Medico</th>
                <th>Especialidade</th>
                <th>CRM</th>
                </tr>

                <?php
                while ($row = $stmt->fetch()) {
                $dataHora= htmlspecialchars($row['DataHora']);
                $paciente = htmlspecialchars($row['paciente']);
                $email = htmlspecialchars($row['email']);
                $telefone = htmlspecialchars($row['telefone']);
                $medico = htmlspecialchars($row['medico']);
                $especialidade = htmlspecialchars($row['especialidade']);
                $crm = htmlspecialchars($row['crm']);

                echo <<<HTML
                    <tr>
                    <td>$dataHora</td>
                    <td>$paciente</td> 
                    <td>$email</td>
                    <td>$telefone</td>
                    <td>$medico</td>
                    <td>$especialidade</td>
                    <td>$crm</td>
                    </tr>      
                HTML;
                }
                ?>
            </table>
        </div>
    </main>

    <footer>
                <address>
                    <img src="../Imagem/localizacao.png" alt="Icone localizacao" height="20" width="20"> Av. João Naves de Ávila, 2121, Santa Mônica, Uberlândia-MG<br>
                    <img src="../Imagem/telefone.png" alt="Icone telefone" height="20" width="20"> (34) 99999-9999
                </address>
            </footer>
</body>
</html>