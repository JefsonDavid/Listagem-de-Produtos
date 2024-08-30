<?php
    require 'config.php';
    require 'models/ProdutosDaoMysql.php';

    $produtosDao = new ProdutosDaoMysql($pdo);

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'nome');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $valor = filter_input(INPUT_POST, 'valor');


    if($id && $nome && $quantidade && $valor) {
        $produtos = new Usuario();
        $produtos->setId($id);
        $produtos->setNome($nome);
        $produtos->setQuantidade($quantidade);
        $produtos->setValor($valor);

        $produtosDao->update($produtos);

        header("Location: listagem.php");
        exit;
    } else {
        header("Location: editar.php?id=".$id);
        exit;
    }