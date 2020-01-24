<?php
if(isset($_POST['email']) && !empty($_POST['email'])){
    require 'connect.php';
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    $sql = ("SELECT * FROM USUARIOS WHERE EMAIL = :email AND SENHA = :senha");
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        header("location: main.php");
    }
}
?>
<!DOCTYPE>
<HTML>
<title>Login</title>
<link href="style.css" rel="stylesheet"/>
    <Head>

    </Head>
    <Body>
        <form method ="POST"> <!-- arquivo que recebe o formulario (coment html)-->
            <div class="login">
                <div class="title">LOGIN</div>
                <input class="email" type="text" name="email" placeholder="Email"> </br></br>
                <input class="senha" type="password" name="senha" placeholder="Senha"> </br></br>
                <input class="enviar" type="submit" value="Enviar Dados">
            </div>
        </form>
    </Body>
</HTML>