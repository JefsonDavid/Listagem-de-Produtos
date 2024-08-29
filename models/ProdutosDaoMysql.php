<?php
    require_once 'Usuario.php';
    require_once 'Produtos.php';

    class ProdutosDaoMysql implements ProdutosDao {
        private $pdo;

        public function __construct(PDO $engine) {
            $this->pdo = $engine;
        }

        public function findAll() {
            $array = [];

            $sql = $this->pdo->query("SELECT * FROM produtos");

            if($sql->rowCount() > 0) {
                $data = $sql->fetchAll();


                foreach($data as $item) {
                    $u = new Produtos();
                    $u->setId($item['id']);
                    $u->setNome($item['nome']);
                    $u->setQuantidade($item['quantidade']);
                    $u->setValor($item['valor']);

                    $array[] = $u;

                }
            }

            return $array;
        }
    }