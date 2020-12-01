<?php


declare(strict_types = 1);

namespace Service\Product;

use Model;

class SortStrategyName implements ISortStrategy
{
    /** @inheritdoc  */
    public function sort(array $array): array
    {
        usort($array, array($this, "nameCmp"));
        return $array;
    }

    /**
     * @param Model\Entity\Product $a
     * @param Model\Entity\Product $b
     * @return int */
    public function nameCmp($a, $b): int
    {
        return strcmp($a->getName(), $b->getName());
    }
}
