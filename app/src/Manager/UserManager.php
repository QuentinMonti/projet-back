<?php

namespace App\Manager;

use Cacofony\BaseClasse\BaseManager;

class UserManager extends BaseManager
{
    function createUser($name, $pwd)
    {
        try 
        {
            $statement = $this->pdo->prepare("INSERT INTO User(username, pwd) VALUES (:username, :pwd)");
            $statement->bindValue('username', $name);
            $statement->bindValue('pwd', $pwd);
            $statement->execute();
            
            return true;
        } catch(\PDOException $e) {
            return  "<br> voici l'erreur:" . $e->getMessage();

        }
    }
}