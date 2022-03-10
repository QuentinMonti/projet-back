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
            
            return "New record created successfully";
        } catch(\PDOException $e) {
            return  "<br> voici l'erreur:" . $e->getMessage();

        }
    }
}