<!DOCTYPE html>
<html lang="en">
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
            header("Location: listagem.php");
            exit;
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Produto</title>
</head>
<body>
    <div>
        <form method="POST" action="editar_action.php">
            <input type="hidden" name="id" values="<?= $produtos->getId(); ?>"/>

            <label>
                Nome:<br/>
                <input type="nome" name="nome" value="<?= $produtos->getNome() ?>"/>
            </label><br/><br/>

            <label>
                Quantidade:<br/>
                <input type="quantidade" name="quantidade" value="<?= $produtos->getQuantidade() ?>">
            </label><br/><br/>

            <label>
                Valor:<br/>
                <input type="valor" name="valor" value="<?= $produtos->getValor() ?>">
            </label><br/><br/>

            <input type="submit" value="Salvar" />
        </form>
    </div>
</body>
</html>