<?php
    class Produtos {
        private $id;
        private $nome;
        private $quantidade;
        private $valor;

        public function getId() {
            return $this->id;
        }

        public function setId($i) {
            $this->id = trim($i);
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($n) {
            $this->nome = $n;
        }

        public function getQuantidade() {
            return $this->quantidade;
        }

        public function setQuantidade($q) {
            $this->quantidade = $q;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($v) {
            $this->valor = $v;
        }
    }

    interface ProdutosDao{
        public function add(Produtos $p);
        public function findAll();
        public function findById($id);
        public function update(Produtos $p);
        public function delete($id);
    }