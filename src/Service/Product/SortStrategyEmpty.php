<?php


declare(strict_types = 1);

namespace Service\Product;

use Model;

class SortStrategyEmpty implements ISortStrategy
{
    /** @inheritdoc  */
    public function sort(array $array): array
    {
        return $array;
    }
}
