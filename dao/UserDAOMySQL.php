<?php
// require ('Models\User.php');
require(__DIR__ . '/../Models/User.php');


class UserDAOMySQL implements UserDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function Add(User $u)
    {
        $sql = $this->pdo->prepare('INSERT INTO test.users (Username,UserEmail,Status) VALUES (:name, :email, :status) ');
        $sql->bindValue(':name', $u->getUsername());
        $sql->bindValue(':email', $u->getUserEmail());
        $sql->bindValue(':status', $u->getStatus());
        $sql->execute();

        $u->setCodUser($this->pdo->lastInsertId());
        return $u;

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
        $sql = $this->pdo->prepare("SELECT * FROM users WHERE UserEmail = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $u = new User();
            $u->setUsername($row['']);
            $u->setUserEmail($row['']);
            $u->setStatus($row['']);
            return $u;
        } else {
        }
    }
    public function update(User $u)
    {
    }
    public function delete($CodUser)
    {
    }
}
