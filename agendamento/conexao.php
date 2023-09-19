<?php
$host = 'sql201.epizy.com';
$user = 'epiz_34256183';
$pass = 'JDVQrrnHwHB';
$db = 'epiz_34256183_clinica';

try{
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(Exception $e) {
    echo $e->getMessage();
    exit;
}