<?php
require 'connect.php';
?>
<title charset="utf8">Área Restrita</title>

<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php
    $sql = "SELECT * FROM USUARIOS";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $usuario) {
            echo '<tr>';
            echo '<td>'.$usuario['nome'].'</td>';
            echo '<td>'.$usuario['email'].'</td>';
            echo '<td><a href="editar.php?id='.$usuario['id'].'">Editar</a> -
                      <a href="excluir.php?id='.$usuario['id'].'">Excluir</a>';
        }
        
    }
    ?>
</table></br></br>
<a href="adicionar.php">Adicionar Novo Usuário</a>