<?php
#Iniciando Sessão
session_start();

#Requerendo o ModelUsuario
require_once 'ModelUsuario.php';

#Criando um objecto do tipo Usuario
$usuario = new ModelUsuario();

#Verifica se o formulario foi submetido
if (isset($_POST['Cadastrar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    #Faça as devidas validações antes de enviar os dados para o Model.

    $usuario->setNome($nome);
    $usuario->setEmail($email);

    #Verifica o retorno do método inserir()
    if ($usuario->inserir()) {
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar!";
        header('Location: ../index.php');
    }
}

if (isset($_POST['Atualizar'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $id = (int)$_POST['id'];

    $usuario->setNome($nome);
    $usuario->setEmail($email);
    
    if ($usuario->atualizar($id)) {
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar!";
        header('Location: ../index.php');
    }
}

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($usuario->eliminar($id)) {
        $_SESSION['mensagem'] = "Eliminado com sucesso!";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao eliminar!";
        header('Location: ../index.php');
    }
}
