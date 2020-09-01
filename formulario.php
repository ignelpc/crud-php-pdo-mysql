<?php
include_once 'Includes/Header.php';
#Requerendo o ModelUsuario
require_once 'Classes/ModelUsuario.php';

$usuario = new ModelUsuario();

if(isset($_GET['id'])){
    $acao = "Atualizar";

    $id = (int)$_GET['id'];

    $user = $usuario->listar($id);
    $id = $user->id;
    $nome = $user->nome;
    $email = $user->email;
}else{
    $acao = "Cadastrar";
    $id = "";
    $nome = "";
    $email = "";
}

?>


<div>
    <form name="formulario" method="POST" action="Classes/ControllerUsuario.php">
        <fieldset>
            <legend class="h2">Cadastro</legend>

            <input type="hidden" name="acao" id="acao" value="<?php echo $acao; ?>">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <div class="form-group col-6">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?= $nome?>">
                </div>
                <div class="form-group col-6">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="<?= $email?>">
                </div>
                <div class="form-group col-6">
                    <input type="submit" class="btn btn-primary" name="<?= $acao?>" value="<?= $acao?>">
                </div>
            </div>
        </fieldset>
    </form>
</div>

<?php
include_once 'Includes/Footer.php';
?>