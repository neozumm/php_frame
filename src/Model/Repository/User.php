<?php

declare(strict_types = 1);

namespace Model\Repository;

use DateTimeImmutable;
use DateTimeZone;
use Model\Entity;

class User
{
    /**
         * Получаем всех пользователей
         *
         * @return Entity\User[]
         */
    public function fetchAll(): array
    {
        $userList = [];
        foreach ($this->getDataFromSource() as $item) {
            $userList[] = $this->createUser($item);
        }

        return $userList;
    }

    /**
     * Получаем пользователя по идентификатору
     *
     * @param int $id
     * @return Entity\User|null
     */
    public function getById(int $id): ?Entity\User
    {
        foreach ($this->getDataFromSource(['id' => $id]) as $user) {
            return $this->createUser($user);
        }

        return null;
    }

    /**
     * Получаем пользователя по логину
     *
     * @param string $login
     * @return Entity\User
     */
    public function getByLogin(string $login): ?Entity\User
    {
        foreach ($this->getDataFromSource(['login' => $login]) as $user) {
            if ($user['login'] === $login) {
                return $this->createUser($user);
            }
        }

        return null;
    }

    /**
     * Фабрика по созданию сущности пользователя
     *
     * @param array $user
     * @return Entity\User
     */
    private function createUser(array $user): Entity\User
    {
        $role = $user['role'];

        return new Entity\User(
            $user['id'],
            $user['name'],
            $user['login'],
            $user['password'],
            new Entity\Role($role['id'], $role['title'], $role['role']),
            $user['bdate'],
            $user['lastPurchase']
        );
    }

    /**
     * Получаем пользователей из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $admin = ['id' => 1, 'title' => 'Super Admin', 'role' => 'admin'];
        $user = ['id' => 1, 'title' => 'Main user', 'role' => 'user'];
        $test = ['id' => 1, 'title' => 'For test needed', 'role' => 'test'];

        $dataSource = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'login' => 'root',
                'password' => '$2y$10$GnZbayyccTIDIT5nceez7u7z1u6K.znlEf9Jb19CLGK0NGbaorw8W', // 1234
                'role' => $admin,
                'bdate' => new DateTimeImmutable("2020-11-01 00:00:00", new DateTimeZone("Europe/Moscow")),
                'lastPurchase' => 2000
            ],
            [
                'id' => 2,
                'name' => 'Doe John',
                'login' => 'doejohn',
                'password' => '$2y$10$j4DX.lEvkVLVt6PoAXr6VuomG3YfnssrW0GA8808Dy5ydwND/n8DW', // qwerty
                'role' => $user,
                'bdate' => new DateTimeImmutable("2020-11-01 00:00:00", new DateTimeZone("Europe/Moscow")),
                'lastPurchase' => 2000
            ],
            [
                'id' => 3,
                'name' => 'Ivanov Ivan Ivanovich',
                'login' => 'i**3',
                'password' => '$2y$10$TcQdU.qWG0s7XGeIqnhquOH/v3r2KKbes8bLIL6NFWpqfFn.cwWha', // PaSsWoRd
                'role' => $user,
                'bdate' => new DateTimeImmutable("2020-11-01 00:00:00", new DateTimeZone("Europe/Moscow")),
                'lastPurchase' => 2000
            ],
            [
                'id' => 4,
                'name' => 'Test Testov Testovich',
                'login' => 'testok',
                'password' => '$2y$10$vQvuFc6vQQyon0IawbmUN.3cPBXmuaZYsVww5csFRLvLCLPTiYwMa', // testss
                'role' => $test,
                'bdate' => new DateTimeImmutable("2020-11-01 00:00:00", new DateTimeZone("Europe/Moscow")),
                'lastPurchase' => 2000
            ],
            [
                'id' => 5,
                'name' => 'Student',
                'login' => 'student',
                'password' => '$2y$10$vQvuFc6vQQyon0IawbmUN.3cPBXmuaZYsVww5csFRLvLCLPTiYwMa', // testss
                'role' => $user,
                'bdate' => new DateTimeImmutable("2020-11-03 00:00:00", new DateTimeZone("Europe/Moscow")),
                'lastPurchase' => 2000
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return (bool) array_intersect_assoc($dataSource, $search);
        };

        return array_filter($dataSource, $productFilter);
    }
}
