<?php

declare(strict_types=1);

namespace Model\Repository;

use Model\Entity;

class Product
{
    /**
     * Поиск продуктов по массиву id
     *
     * @param int[] $ids
     * @return Entity\Product[]
     */
    public function search(array $ids = []): array
    {
        if (!count($ids)) {
            return [];
        }

        $productList = [];
        foreach ($this->getDataFromSource(['id' => $ids]) as $item) {
            $product = new Entity\Product($item['id'], $item['name'], $item['price'], $item['description']);
            $productList[] = clone $product;
        }

        return $productList;
    }

    /**
     * Получаем все продукты
     *
     * @return Entity\Product[]
     */
    public function fetchAll(): array
    {
        $productList = [];
        foreach ($this->getDataFromSource() as $item) {
            $product=new Entity\Product($item['id'], $item['name'], $item['price'], $item['description']);
            $productList[] = clone $product;
        }

        return $productList;
    }

    /**
     * Получаем продукты из источника данных
     *
     * @param array $search
     *
     * @return array
     */
    private function getDataFromSource(array $search = [])
    {
        $dataSource = [
            [
                'id' => 1,
                'name' => 'PHP',
                'price' => 15300,
                'description' => 'ok',
            ],
            [
                'id' => 2,
                'name' => 'Python',
                'price' => 20400,
                'description' => 'python nice',
            ],
            [
                'id' => 3,
                'name' => 'C#',
                'price' => 30100,
                'description' => 'not python',
            ],
            [
                'id' => 4,
                'name' => 'Java',
                'price' => 30600,
                'description' => 'not nice',
            ],
            [
                'id' => 5,
                'name' => 'Ruby',
                'price' => 18600,
                'description' => 'nice',
            ],
            [
                'id' => 8,
                'name' => 'Delphi',
                'price' => 8400,
                'description' => 'old',
            ],
            [
                'id' => 9,
                'name' => 'C++',
                'price' => 19300,
                'description' => 'OOP',
            ],
            [
                'id' => 10,
                'name' => 'C',
                'price' => 12800,
                'description' => 'very old',
            ],
            [
                'id' => 11,
                'name' => 'Lua',
                'price' => 5000,
                'description' => 'not js',
            ],
            [
                'id' => 12,
                'name' => 'Rust',
                'price' => 2000,
                'description' => 'rusty',
            ],
        ];

        if (!count($search)) {
            return $dataSource;
        }

        $productFilter = function (array $dataSource) use ($search): bool {
            return in_array($dataSource[key($search)], current($search), true);
        };

        return array_filter($dataSource, $productFilter);
    }
}
