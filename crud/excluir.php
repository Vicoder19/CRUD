<?php
include 'class/produto.php';
$produtos = new Produtos();
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $produtos->excluir($id);
    header("Location: index.php");
}
?>