<?php

declare(strict_types = 1);

namespace Service\User;

use Model;

class User
{
/**
     * Получаем информацию по конкретному пользователю
     *
     * @param int $id
     * @return Model\Entity\User|null
     */
    public function getInfo(int $id): ?Model\Entity\User
    {
        $user = $this->getUserRepository()->getById($id);
        return count($user) ? $user[0] : null;
    }

    /**
     * Получаем всех пользователей
     *
     * @return Model\Entity\User[]
     */
    public function getAll(): array
    {
        $userList = $this->getUserRepository()->fetchAll();

        return $userList;
    }

    /**
     * Фабричный метод для репозитория User
     *
     * @return Model\Repository\User
     */
    protected function getUserRepository(): Model\Repository\User
    {
        return new Model\Repository\User();
    }
}
