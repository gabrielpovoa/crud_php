<?php


class User
{
    private $CodUser;
    private $Username;
    private $UserEmail;
    private $Status;


    public function setCodUser($id)
    {
        $this->CodUser = trim($id);
    }
    public function setUsername($name)
    {
        $this->Username = ucwords(trim($name));
    }
    public function setUserEmail($email)
    {
        $this->UserEmail = strtolower(trim($email));
    }
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    public function getCodUser()
    {
        return $this->CodUser;
    }
    public function getUsername()
    {
        return $this->Username;
    }
    public function getUserEmail()
    {
        return $this->UserEmail;
    }
    public function getStatus()
    {
        return $this->Status;
    }
}


interface UserDAO {
    public function Add(User $u);
    public function findAll();
    public function findByCodUser($CodUser);
    public function findByName($Username);
    public function findByEmail($email);
    public function update(User $u);
    public function delete($CodUser);
}