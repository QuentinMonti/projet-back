<?php

namespace App\Manager;

use Cacofony\BaseClasse\BaseManager;

class PostManager extends BaseManager
{

    function createPost($title, $content)
    {
        $authorId = '1';

        try 
        {    
            $statement = $this->pdo->prepare("INSERT INTO Post(title, content, authorId) VALUES (:title, :content, :authorId)");
            $statement->bindValue('title', $title);
            $statement->bindValue('content', $content);
            $statement->bindValue('authorId', $authorId);
            $statement->execute();

            return true;
        } catch(\PDOException $e) {
            return  "<br> voici l'erreur:" . $e->getMessage();

        }
    }
}


