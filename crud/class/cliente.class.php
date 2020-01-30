<?php
class Clientes{
Private $pdo;
public function __construct(){
	try{ $this->pdo = new PDO("mysql:dbname=crud;host=localhost", root, "");
	}catch(PDOEsception $e){
	echo "Erro: ".$e->getMessage}
	return true;
	
}
public function existeCliente($email){
	$sql = $this->pdo->prepare("select * from clientes where email = :email");
	$sql->bindValue(':email', $email)
	$sql->execute();
	if($sql->rowCount() > 0){
	return true;
	}else{
	return false}
}
public function addCliente($nome, $email, $UF){
	if($this->existeCliente($nome) == false){
	$sql = $this->pdo->prepare("INSERT into clientes (nome, email, uf) value (:nome, :email, :uf)");
	$sql->bindValue(':nome', $nome);
	$sql->bindValue(':email', $email);
	$sql->bindValue(':uf', $uf);
	$sql->execute();
	return true;
	}
}

public function excluirCliente($id){
	$sql = $this->pdo->prepare("delete from clientes where id = :id")
	$sql->bindValue(':id', $id);
	$sql->execute();
	return true;
	}
}
public function getClientes(){
	$sql = $this->pdo->query("SELECT * FROM clientes")
	if($sql->rowCount() > 0){
	return true;
	}else{
	return false;}
	}

?>