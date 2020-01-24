<?php
if (isset($_POST['nome']) && !empty($_POST['nome'])){
    require 'connect.php';

    $nome = addslashes($_POST['nome']);
    $marca = addslashes($_POST['marca']);
    $estoque = addslashes($_POST['estoque']);
    $custo = addslashes($_POST['custo']);
    $venda = addslashes($_POST['venda']);
    $sql = "INSERT INTO produtos (nome, marca, estoque, custo, venda) VALUES (:nome, :marca, :estoque, :custo, :venda)";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':marca', $marca);
    $sql->bindValue(':estoque', $estoque);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':venda', $venda);
    $sql->execute();
    header("location: main.php");
}
?>
<form method="POST">
    Nome: <input type="text" name="nome"></br></br>
    Marca: <input type="text" name="marca"> </br></br>
    Estoque: <input type="number" step="any" name="estoque"> </br></br>
    Custo: <input type="number" step="any" name="custo"> </br></br>
    Venda: <input type="number=" step="any" name="venda"> </br></br>
    <input type="submit" value="Cadastrar">

</form>
