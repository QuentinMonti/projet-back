<?php

namespace App\Manager;

use Cacofony\BaseClasse\BaseManager;

class PostManager extends BaseManager
{

    function createPost($date, $title, $content, $author)
    {
        try 
        {    
            $statement = $this->pdo->prepare("INSERT INTO User(username, pwd) VALUES (:dateCreation, :title, :content, :author)");
            $statement->bindValue('dateCreation', $date);
            $statement->bindValue('title', $title);
            $statement->bindValue('content', $content);
            $statement->bindValue('author', $author);
            $statement->execute();

            return "New record created successfully";
        } catch(\PDOException $e) {
            return  "<br> voici l'erreur:" . $e->getMessage();

        }
    }
}


