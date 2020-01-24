<?php
include 'class/produto.php';
$produtos = new Produtos();
if(isset($_POST['nome']) && !empty($_POST['nome']) ){
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $estoque = $_POST['estoque'];
    $custo = $_POST['custo'];
    $venda = $_POST['venda'];
    $produtos->adicionar($nome, $marca, $estoque, $custo, $venda);
    header("Location: index.php");
}
?>
<h1>Adicionar</h1>
<form method="POST">
    Nome: <input type="text" name="nome"></br></br>
    Marca: <input type="text" name="marca"></br></br>
    Estoque: <input type="number" step="any" name="estoque"></br></br>
    Custo: <input type="number" step="any" name="custo"></br></br>
    Venda: <input type="number" step="any" name="venda"></br></br>
    <input type="submit" value="ENVIAR">
</form>