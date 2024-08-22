<?php
    require_once 'Usuario.php';

    class UsuarioDaoMysql implements UsuarioDao {
        private $pdo;

        public function __construct(PDO $driver) {
            $this->pdo = $driver;
        }

        //Add um admin
        public function add(Usuario $u) {
            $sql = $this->pdo->prepare("INSERT INTO administrador (email, senha) VALUES (:email, :senha)");

            $sql->bindValue(':email', $u->getEmail());
            $sql->bindValue(':senha', $u->getSenha());
            $sql->execute();

            $u->setId($this->pdo->lastInsertId());
            return $u;
        }
    }