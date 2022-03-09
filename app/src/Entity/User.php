<?php

namespace App\Entity;

use Cacofony\BaseClasse\BaseEntity;
use DateTime;
use Exception;

class User extends BaseEntity
{
    public int $id;
    public DateTime $createdAt;
    public string $username;
    public string $password;
    public string $role;

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
    public function getPwd(): string
    {
        return $this->password;
    }

    /**
     * @param string $pwd
     * @return Post
     */
    public function setPwd(string $pwd): self
    {
        $this->pwd = $pwd;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Post
     */
    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
}