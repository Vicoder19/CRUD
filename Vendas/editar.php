<?php
require 'connect.php';
$id = 0;
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
}
if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $marca = addslashes($_POST['marca']);
    $estoque = addslashes($_POST['estoque']);
    $custo = addslashes($_POST['custo']);
    $venda = addslashes($_POST['venda']);

    $sql = "UPDATE produtos SET NOME = :nome, MARCA = :marca, ESTOQUE = :estoque,
            CUSTO = :custo, VENDA = :venda WHERE ID = :id";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':marca', $marca);
    $sql->bindValue(':estoque', $estoque);
    $sql->bindValue(':custo', $custo);
    $sql->bindValue(':venda', $venda);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header("location: main.php");
}
$sql = "SELECT * FROM produtos WHERE ID = '$id'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0){
    $dado = $sql->fetch();
}else{
    header("location: main.php");
}

?>
<form method = "POST">
    Nome: <input type="text" name="nome" value="<?php echo $dado['nome']?>"></br></br>
    Marca: <input type="text" name="marca" value="<?php echo $dado['marca']?>"></br></br>
    Estoque: <input type="number" step="any" name="estoque" value="<?php echo $dado['estoque']?>"></br></br>
    Custo: <input type="number" step="any" name="custo" value="<?php echo $dado['custo']?>"></br></br>
    Venda: <input type="number" step="any" name="venda" value="<?php echo $dado['venda']?>"></br></br>
    <input type="submit" value="Editar">
</form>

