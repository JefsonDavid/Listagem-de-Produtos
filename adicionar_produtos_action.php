<?php
    require 'config.php';
    require 'models/ProdutosDaoMysql.php';

    $produtosDao = new ProdutosDaoMysql($pdo);

    $nome =  filter_input(INPUT_POST, 'nome');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $valor = filter_input(INPUT_POST, 'valor');

    if($nome && $quantidade && $valor) {
        $novoProduto = new Produtos();
        $novoProduto->setNome($nome);
        $novoProduto->setQuantidade($quantidade);
        $novoProduto->setValor($valor);

        $produtosDao->add($novoProduto);

        header ("Location: listagem.php");
        exit;
    } else {
        header ("Location: adicionar_produtos.php");
        exit;
    }