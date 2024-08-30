<?php
    require_once 'Usuario.php';
    require_once 'Produtos.php';

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

        public function authenticationLogin($email, $senha) {
            $sql = $this->pdo->prepare("SELECT * FROM administrador WHERE email = :email AND senha = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();

            if($sql->rowCount() > 0) {
                // $data = $sql->fetch();

                // $u = new Usuario();
                // $u->setId($data['id']);
                // $u->setEmail($data['email']);
                // $u->setSenha(['senha']);

                return true;
            } else {
                return false;
            }

        }
        
    }
    