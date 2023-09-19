<?php include ("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="formatacaoagendamento.css">
    <script src="script.js"></script>
    <script src="validacao.js"></script>
    <title>Agendamento </title>
</head>

<body>
    <header>
        <img src="../galeria/Imagem/logo.png" alt='logotipo' id="logo" width=130 height=130>
        <h1>Clínica Rede Mais</h1>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../galeria/galeria.html">Galeria</a></li>
            <li><a href="../login/login.html">Login</a></li>
            <li><a href="../mensagensdecontato/contato.html">Contato</a></li>
        </ul>
    </nav>

    <main>
        <h3>Agendamento</h3>
        <p>Preencha os campos abaixo: </p>
        <form name= cadastroagenda action="cadastra_agendamento.php" method="get">
            <div class="row">
                <div class="col-sm-4  gy-5">
                    <label for="especialidade" class="form-label">Especialidade:</label>
                    <select name="especialidade" class="form-select" id="especialidade">
                        <option value="selecione" selected>Selecione uma especialidade</option>
                        <?php
 
                        $sql = <<<SQL
                        SELECT DISTINCT especialidade
                        FROM medico
                        SQL;
                    
                        $stmt = $conn->query($sql);
                        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($registros as $option) {
                            ?>
                                <option value="<?php echo $option['especialidade']?>"><?php echo $option['especialidade']?></option>
                            <?php
                        }
                        ?>
                    </select>
                    
                </div>

                <div class="col-sm-4  gy-5">
                    <label for="medico" class="form-label">Médico:</label>
                    <select name="medico" class="form-select" id="medico">
                    <option value="selecione" selected>Selecione um(a) médico(a)</option>
                    </select>
                     
                </div>

                <div class="col-sm-4  gy-5">
                    <label for="datetime" class="form-label">Data e hora da consulta:</label>
                    <input type="datetime-local" class="form-control" name="datetime" id="datetime">
                    <span></span> 
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 gy-5">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                    <span></span> 
                </div>

                <div class="col-sm-4  gy-5">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <span></span> 
                       
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6  gy-5">
                    <label for="sexo" class="form-label">Sexo: </label>
                    <select name="sexo" class="form-select" id="sexo">
                        <option selected>Selecione:</option>
                        <option value="feminino">Feminino</option>
                        <option value="masculino">Masculino</option>
                        <option value="outros">Outros</option>
                    </select>
                    <span></span>
                </div>
                    
                <div class="col-sm-6  gy-5">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone">
                    <span></span> 
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm  gy-5">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
        <p>Deseja consultar um agendamento? Então, <a href="../consultaagendamento/consultaagendamento.html">clique aqui</a></li> </p>
    </main>
    <footer>
        <address>
            <img src="../galeria/Imagem/localizacao.png" alt="Icone localizacao" height="20" width="20"> Av. João Naves
            de Ávila, 2121, Santa Mônica, Uberlândia-MG<br>
            <img src="../galeria/Imagem/telefone.png" alt="Icone telefone" height="20" width="20"> (34) 99999-9999
        </address>
    </footer>
</body>

</html>