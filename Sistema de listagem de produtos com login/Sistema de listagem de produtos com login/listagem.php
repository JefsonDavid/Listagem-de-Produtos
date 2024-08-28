<?php
    require 'config.php';
    require 'models/UsuarioDaoMysql.php';
    require 'models/ProdutosDaoMysql.php';

    $produtosDao = new ProdutosDaoMysql($pdo);

    $lista = $produtosDao->findAll();
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


    <?php foreach($lista as $produtos): ?>

        <tr>
            <td><?= $produtos->getId(); ?></td>
            <td><?= $produtos->getNome(); ?></td>
            <td><?= $produtos->getQuantidade(); ?></td>
            <td><?= $produtos->getValor(); ?></td>
            <td>
                <a href="editar.php?id=<?=$produtos->getId(); ?>">[ Editar ]</a>

                <a href="excluir.php?id=<?= $produtos->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>