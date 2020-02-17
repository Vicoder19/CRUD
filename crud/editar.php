<?php
include 'class/produto.php';
$produtos = new Produtos();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
}else{
    header("Location: index.php");
}
if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $estoque = $_POST['estoque'];
    $custo = $_POST['custo'];
    $venda = $_POST['venda'];
    $produtos->editar($id, $nome, $marca, $estoque, $custo, $venda);
    header("Location: index.php");
}
$dado = $produtos->get($id);
?>
<h1>Editar</h1>
<form method="POST">
Nome: <input type="text" name="nome" value="<?php echo $dado['nome']?>"></br></br>
Marca: <input type="text" name="marca" value="<?php echo $dado['marca']?>"></br></br>
Estoque: <input type="number" step="any" name="estoque" value="<?php echo $dado['estoque']?>"></br></br>
Custo: <input type="number" step="any" name="custo" value="<?php echo $dado['custo']?>"></br></br>
Venda: <input type="number" step="any" name="venda" value="<?php echo $dado['venda']?>"></br></br>
    <input type="submit" value="ENVIAR">
</form>