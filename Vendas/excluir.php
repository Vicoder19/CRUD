<?php
require 'connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    $sql = "DELETE FROM produtos WHERE id = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header("location: main.php");

}else{
    echo 'sem id do produto';
    header("main: main.php");
}
?>