<?php
    class Usuario {
        private $id;
        private $email;
        private $senha;

        public function getId() {
            return $this->id;
        }

        public function setId($i) {
            $this->id = trim($i);
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($e) {
            $this->email = strtolower(trim($e));
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($s) {
            $this->senha = $s;
        }
    }

    interface UsuarioDao {

        public function add(Usuario $u);
        public function findByEmail($email);
        public function update(Usuario $u);
        public function delete($id);
    }