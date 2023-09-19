<?php

function checkLogin($pdo, $email, $senha)
{
    $sql = <<<SQL
    SELECT senhaHash
    FROM funcionario
    WHERE email = ?
    SQL;

    try {

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if (!$row )
            return false;
            return password_verify($senha, $row['senhaHash']);
    }
    catch (Exception $e) {
        exit("Falha inesperada: " . $e.getMessage());
    }
}

require "../conexaoMySQL.php";
$pdo = mysqlConnect();

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

if (checkLogin($pdo, $email, $senha))
    header("location: ../arearestrita/menu.html");
else
    header("location: login.html")
?>