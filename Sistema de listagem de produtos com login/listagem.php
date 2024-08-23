<?php
    require 'config.php';
    require 'models/UsuarioDaoMysql.php';
    require 'models/ProdutosDaoMysql.php';

    $usuarioDao = new UsuarioDaoMysql($pdo);

    $lista = $usuarioDao->findAll();
?>

<a href="adicionar_produtos.php">ADICIONAR PRODUTOS</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>QUANTIDADE</th>
        <th>VALOR</th>
        <th>AÇÕES</th>
    </tr>


    <?php foreach($lista as $usuario): ?>

        <tr>
            <td><?= $usuario->getId(); ?></td>
            <td><?= $usuario->getNome(); ?></td>
            <td><?= $usuario->getQuantidade(); ?></td>
            <td><?= $usuario->getValor(); ?></td>
            <td>
                <a href="editar.php?id=<?=$usuario->getId(); ?>">[ Editar ]</a>

                <a href="excluir.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>