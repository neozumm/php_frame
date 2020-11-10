<?php

declare(strict_types = 1);

namespace Service\Discount;

interface IDiscount
{
    /**
     * Получаем скидку в процентах
     *
     * @param Entity\User $user
     * @param float $totalprice
     * @param string[] $basket
     * @return float
     */
    public function getDiscount($user, $totalprice, $basket): float;
}
