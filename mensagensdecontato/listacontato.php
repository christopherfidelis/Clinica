<?php

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

try {
  $sql = <<<SQL
  SELECT codigo, nome, email, telefone, mensagem, datahora
  FROM contato
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
      <title>Listagem de contatos</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <link rel="stylesheet" href="formatacaocontato.css">   
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
      <div class="table-responsive">
        <h3>Listagem de contatos</h3>
        <table class="table table-striped table-hover">
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Comentário</th>
            <th>Data e hora</th>
          </tr>

          <?php
          while ($row = $stmt->fetch()) {

            $codigo = htmlspecialchars($row['codigo']);
            $nome = htmlspecialchars($row['nome']);
            $email = htmlspecialchars($row['email']);
            $telefone = htmlspecialchars($row['telefone']);
            $mensagem = htmlspecialchars($row['mensagem']);
            $datahora = htmlspecialchars($row['datahora']);

            echo <<<HTML
              <tr>
                <td>$codigo</td>
                <td>$nome</td> 
                <td>$email</td>
                <td>$telefone</td>
                <td>$mensagem</td>
                <td>$datahora</td>
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