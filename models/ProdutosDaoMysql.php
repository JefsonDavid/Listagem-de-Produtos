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

        public function findById($id) {
            $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if($sql->rowCount() > 0) {
                $data = $sql->fetch();

                $p = new Produtos();
                $p->setId($data['id']);
                $p->setNome($data['nome']);
                $p->setQuantidade($data['quantidade']);
                $p->setValor($data['valor']);

                return $p;
            } else {
                return false;
            }
        }

        public function update(Produtos $p) {
            $sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, quantidade = :quantidade, valor = :valor WHERE id = :id");
            $sql->bindValue(':nome', $p->getNome());
            $sql->bindValue(':quantidade', $p->getQuantidade());
            $sql->bindValue(':valor', $p->getValor());
            $sql->bindValue(':id', $p->getId());
            $sql->execute();

            return true;
        }
    }