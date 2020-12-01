<?php


declare(strict_types = 1);

namespace Service\Product;

use Model;

class SortStrategyPrice implements ISortStrategy
{
    /** @inheritdoc  */
    public function sort(array $array): array
    {
        usort($array, array($this, "priceCmp"));
        return $array;
    }

    /**
     * @param Model\Entity\Product $a
     * @param Model\Entity\Product $b
     * @return int */
    public function priceCmp($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }
}
