<?php


declare(strict_types = 1);

namespace Service\Product;

use Model;

interface ISortStrategy
{
    /**
     * @property Model\Entity\Product[] $productList
     * @return  Model\Entity\Product[] */
    public function sort(array $productList): array;
}
