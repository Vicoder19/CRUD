<?php
$dsn = "mysql:dbname=vendas;host=localhost";
$dbuser = "root";
$dbpass = "";
try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);
}catch (PDOException $conn_error){
    echo "A conexão com o Banco falhou: ".$conn_error->getMessage();
}
?>