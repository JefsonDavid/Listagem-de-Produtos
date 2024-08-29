<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require 'config.php';
        require 'models/UsuarioDaoMysql.php';
        require 'models/ProdutosDaoMysql.php';

        $produtosDao = new ProdutosDaoMysql($pdo);

        $lista = $produtosDao->findAll();
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="styles/listagem_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

</head>
<body>
    
</body>
</html>

<!-- <a href="adicionar_produtos.php">ADICIONAR</a> -->

<table>
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
                <a class="adicionar" href="adicionar_produtos.php">ADICIONAR</a>

                <a class="editar" href="editar.php?id=<?=$produtos->getId(); ?>"> Editar </a>

                <a class="excluir" href="excluir.php?id=<?= $produtos->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')"> Excluir </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>