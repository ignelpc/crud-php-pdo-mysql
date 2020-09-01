<?php

include_once 'BD.php';

class ModelUsuario extends BD{

    private $nome;
    private $email;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function inserir(){
        $sql = "INSERT INTO usuarios(nome, email) VALUES(:nome, :email)";
        $stmt = BD::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function listarTodos(){
        $sql = "SELECT * FROM usuarios";
        $stmt = BD::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function listar($id){
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $stmt = BD::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function atualizar($id){
        $sql = "UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id";
        $stmt = BD::prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function eliminar($id){
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = BD::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}