<?php
    require 'config.php';
    require 'models/ProdutosDaoMysql.php';

    $produtosDao = new ProdutosDaoMysql($pdo);

    $id = filter_input(INPUT_GET, 'ID');

    if($id) {
        $produtosDao->delete($id);
    }

    header ("Location: listagem.php");
    exit;