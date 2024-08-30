<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/adicionar_style.css">
    <title>Cadastro de Usuário</title>
</head>
<body>  
    <div class="container">
        <form method="POST" action="adicionar_action.php">
            <h1>Cadastro de Usuário</h1>
            <label class="input-container">
                <p>Email:</p><br/>
                <input type="email" name="email" />
            </label><br/><br/>
            <label class="input-container">
                <p>Senha:</p><br/>
                <input type="password" name="senha">
            </label><br/><br/>

            <button type="submit" class="submit-button">Cadastrar</button>
        </form>
    </div>
</body>
</html>