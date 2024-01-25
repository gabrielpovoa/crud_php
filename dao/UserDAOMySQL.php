<?php
require_once __DIR__ . '/../Models/User.php';

class UserDAOMySQL implements UserDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function Add(User $u)
    {
        try {
            $sql = $this->pdo->prepare("INSERT INTO users (Username,UserEmail,Status) VALUES (:name, :email, :status)");
            $sql->bindValue(':name', $u->getUsername());
            $sql->bindValue(':email', $u->getUserEmail());
            $sql->bindValue(':status', $u->getStatus());
            $sql->execute();

            $u->setCodUser($this->pdo->lastInsertId());
            return $u;
        } catch (PDOException $err) {
            echo "Erros Catched:" . $err->getMessage();
            return null;
        }
    }
    public function findAll()
    {
        $userArrayDao = [];
        $sql = $this->pdo->query("SELECT * FROM users");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $userObj = new User();
                $userObj->setCodUser($item['CodUser']);
                $userObj->setUsername($item['Username']);
                $userObj->setUserEmail($item['UserEmail']);
                $userObj->setStatus($item['Status']);

                $userArrayDao[] = $userObj;
            }
        }
        return $userArrayDao;
    }
    public function findByCodUser($CodUser)
    {
    }
    public function findByName($Username)
    {
    }
    public function findByEmail($email)
    {
    }
    public function update(User $u)
    {
    }
    public function delete($CodUser)
    {
    }
}
