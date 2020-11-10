<?php

declare(strict_types=1);

namespace Service\Discount;

use DateTimeImmutable;
use DateTimeZone;

class Discount implements IDiscount
{
    /**
     *Проверка скидки по дню рождения
     *@param Entitiy\User
     *@return bool
     */
    public function checkBday($user): bool
    {
        $bday = $user->getBdate();
        $beforeBdayBoundary = $bday->modify("-5 days");
        $afterBdayBoundary = $bday->modify("+5 days");
        $today = new DateTimeImmutable('now', new DateTimeZone('Europe/Moscow'));
        return $today >= $beforeBdayBoundary && $today <= $afterBdayBoundary;
    }

    /**
     *Проверка скидки по цене
     *@param float $totalprice
     *@return bool
     */
    public function checkTotal($totalprice): bool
    {
        if($totalprice>=40000){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     *Проверка скидки по наличии в корзине только курса по Delphi
     *@param string[] $basket
     *@return bool
     */
    public function checkDelphi($basket): bool
    {
        if ($basket[0] == "Delphi" && count($basket) == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *@inheritdoc
     */
    public function getDiscount($user, $totalprice, $basket): float
    {
        $discount = 0.0;
        if ($this->checkBday($user)) {
            $discount += 0.05;
        }
        if ($this->checkTotal($totalprice)) {
            $discount += 0.1;
        }
        if ($this->checkDelphi($basket)) {
            $discount += 0.08;
        }
        return $discount;
    }
}
