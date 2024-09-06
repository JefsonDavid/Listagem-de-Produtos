<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Adicionar Produtos</h1>

            <form method="POST" action="adicionar_produtos_action.php">
                <label>
                    Nome do Produto:<br/>
                    <input type="text" name="nome" />
                </label><br/>

                <label>
                    Quantidade:<br/>
                    <input type="text" name="quantidade" />
                </label><br/>

                <label>
                    Valor<br/>
                    <input type="text" nome="valor" />
                </label><br/><br/>

                <input type="submit" value="Adicionar">
            </form>
</body>
</html>