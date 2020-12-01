<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;

class SortContext
{
    /**
     *
     * @param ISortStrategy $strategy
     * @param Model\Entity\Product[] $productList
     *
     * @return Model\Entity\Product[] */
    public function sortWrap(ISortStrategy $strategy, array $productList): array
    {
        return $strategy->sort($productList);
    }
}
