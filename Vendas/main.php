<?php require 'connect.php' ?>
<html>
        <table border="1" width="100%">
            <tr>
                <th>Nome</th>
                <th>Marca</th>
                <th>Estoque</th>
                <th>Custo</th>
                <th>Venda</th>
            </tr>
            <?php
            $sql = "SELECT * FROM produtos";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                foreach($sql->fetchAll() as $produto){
                    echo'<tr>';
                    echo'<td>'.$produto['nome'].'</td>';
                    echo'<td>'.$produto['marca'].'</td>';
                    echo'<td>'.$produto['estoque'].'</td>';
                    echo'<td>'.$produto['custo'].'</td>';
                    echo'<td>'.$produto['venda'].'</td>';
                    echo'<td> <a href="editar.php?id='.$produto['id'].'">Editar</a> -
                            <a href="excluir.php?id='.$produto['id'].'">Excluir</a>';
                }
            }else{echo "Nenhum produto cadastrado";}
            ?>

        </table></br></br>
    <form action="adicionar.php">
        <input type="submit" value="Adicionar Novo">
    </form>

</html>