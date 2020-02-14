<?php
class Produtos
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
    }

    public function adicionar($nome, $marca, $estoque, $custo, $venda)
    {
        if ($this->existeProduto($nome) == false) {
            $sql = "INSERT INTO produtos (nome, marca, estoque, custo, venda) values (:nome, :marca, :estoque, :custo, :venda)";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':marca', $marca);
            $sql->bindValue(':estoque', $estoque);
            $sql->bindValue(':custo', $custo);
            $sql->bindValue(':venda', $venda);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function getAll()
    {
        $sql = "SELECT * from produtos";
        $sql = $this->pdo->query($sql);
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        }

    }

    public function editar($id, $nome, $marca, $estoque, $custo, $venda)
    {
        if ($this->existeProduto($id) == true) {
            $sql = "UPDATE produtos set nome = :nome, marca = :marca, estoque = :estoque, custo = :custo, venda= :venda WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':marca', $marca);
            $sql->bindValue(':estoque', $estoque);
            $sql->bindValue(':custo', $custo);
            $sql->bindValue(':venda', $venda);
            $sql->execute();
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id)
    {
            $sql = "DELETE FROM produtos where id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            return true;
    }


    public function existeProduto($nome){
        $sql = "select * from produtos where nome = :nome";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return true;
        }else{
            return false;
        }

    }
}
