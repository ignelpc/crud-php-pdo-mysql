<?php

include_once 'Includes/Header.php';
#Requerendo o ModelUsuario
require_once 'Classes/ModelUsuario.php';

include_once 'Includes/mensagem.php';

#Criando um objecto do tipo Usuario
$usuario = new ModelUsuario();

?>
<div>
    <h2>Usuários</h2>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Acções</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuario->listarTodos() as $key => $value) : ?>
                <tr>
                    <th scope="row"></th>
                    <td><?= $value->nome ?></td>
                    <td><?= $value->email ?></td>
                    <td>
                        <?= "<a href='formulario.php?id=" . $value->id . "'>Editar</a>"; ?>
                        <?= "<a href='Classes/ControllerUsuario.php?id=" . $value->id . "' onclick=' return confirm(\"Deseja eliminar?\")'>Eliminar</a>"; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="formulario.php" class="btn btn-primary">Cadastrar</a>
</div>

<?php
include_once 'Includes/Footer.php';
?>