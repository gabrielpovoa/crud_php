<?php
include_once './Models/User.php';

class UserDAOMySQL implements UserDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function Add(User $u)
    {
    }
    public function findAll()
    {
        $userArrayDao = [];
        $sql = $this->pdo->query("SELECT * FROM users");

        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item){
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
