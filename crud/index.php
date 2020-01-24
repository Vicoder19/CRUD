<?php
include 'class/produto.php';
$produtos = new Produtos();
?>
<h1>Lista de Produtos</h1>
<a href="adicionar.php">[ADICIONAR]</a></br></br>
<table border="1" width="600">
    <tr>
        <th>Nome</th>
        <th>Marca</th>
        <th>Estoque</th>
        <th>Custo</th>
        <th>Venda</th>
        <th>Ações</th>
    </tr>
    <?php
    $lista = $produtos->getAll();
    foreach($lista as $item):
    ?>
    <tr>
        <td><?php echo $item['nome'];?></td>
        <td><?php echo $item['marca'];?></td>
        <td><?php echo $item['estoque'];?></td>
        <td><?php echo $item['custo'];?></td>
        <td><?php echo $item['venda'];?></td>
        <td><a href="editar.php?id=<?php echo $item['id'];?>">[EDITAR]</a>
            <a href="excluir.php?id=<?php echo $item['id'];?>">[EXCLUIR]</a></td>
    <?php endforeach; ?>
    </tr>

</table>
