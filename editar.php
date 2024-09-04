<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        require 'config.php';
        require 'models/ProdutosDaoMysql.php';

        $produtosDao = new ProdutosDaoMysql($pdo);

        $produtos = false;

        $id = filter_input(INPUT_GET, 'id');

        if($id) {
            $produtos = $produtosDao->findById($id);
        }

        if($produtos === false) {
            header("Location: teste.php");
            exit;
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produto</title>
    <link rel="stylesheet" href="styles/editar_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <h1>Editar Produto</h1>
        <form method="POST" action="editar_action.php">
            <input type="hidden" name="id" values="<?= $produtos->getId(); ?>"/>

            <label>
                Nome:<br/>
                <input type="text" name="nome" value="<?= $produtos->getNome(); ?>"/>
            </label><br/><br/>

            <label>
                Quantidade:<br/>
                <input type="text" name="quantidade" value="<?= $produtos->getQuantidade(); ?>">
            </label><br/><br/>

            <label>
                Valor:<br/>
                <input type="text" name="valor" value="<?= $produtos->getValor(); ?>">
            </label><br/><br/>

            <input class="btn" type="submit" value="Salvar" />
        </form>
    </div>
</body>
</html>