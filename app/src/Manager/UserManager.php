<?php

namespace App\Manager;

use Cacofony\BaseClasse\BaseManager;

class UserManager extends BaseManager
{
    function createUser($name, $pwd)
    {
        try 
        {
            $statement = $this->pdo->prepare("INSERT INTO User(username, pwd) VALUES ($name, $pwd)");
            $statement->execute();

            return "New record created successfully";
        } catch(\PDOException $e) {
            return  "<br> voici l'erreur:" . $e->getMessage();

        }
    }
}