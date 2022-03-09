<?php

namespace App\Entity;

use Cacofony\BaseClasse\BaseEntity;
use DateTime;
use Exception;

class User extends BaseEntity
{
    private int $id;
    private DateTime $createdAt;
    private string $title;
    private string $content;
    private int $authorId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    protected function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Post
     * @throws Exception
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Post
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Post
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}