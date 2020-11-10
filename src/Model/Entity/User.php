<?php

declare(strict_types = 1);

namespace Model\Entity;

use DateTimeImmutable;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $passwordHash;

    /**
     * @var Role
     */
    private $role;

    /**
     * @var DateTimeImmutable
     *
     */
    private $bdate;

    /**
     * @var int
     *
     */
    private $lastPurchase;

    /**
     * @param int $id
     * @param string $name
     * @param string $login
     * @param string $password
     * @param Role $role
     * @param DateTimeImmutable $bdate
     * @param int $lastPurchase
     *
     */
    public function __construct(int $id, string $name, string $login, string $password, Role $role, DateTimeImmutable $bdate, int $lastPurchase)
    {
        $this->id = $id;
        $this->name = $name;
        $this->login = $login;
        $this->passwordHash = $password;
        $this->role = $role;
        $this->bdate = $bdate;
        $this->lastPurchase = $lastPurchase;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

/**
     * @return string
     */
    public function getPurchase(): int
    {
        return $this->lastPurchase;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getBdate(): DateTimeImmutable
    {
        return $this->bdate;
    }
}
