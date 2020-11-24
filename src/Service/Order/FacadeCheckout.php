<?php
declare(strict_types = 1);

namespace Service\Order;

use Model;
use Service\Billing\Card;
use Service\Billing\IBilling;
use Service\Communication\Email;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\Discount\Discount;
use Service\User\ISecurity;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Service\Order\FacadeCheckoutProcess;

class FacadeCheckout
{

/**
     * Оформление заказа
     *
     * @return void
     */
    public function checkout(): void
    {
        // Здесь должна быть некоторая логика выбора способа платежа
        $billing = new Card();

        // Здесь должна быть некоторая логика получения информации о скидки пользователя
        $discount = new Discount();

        // Здесь должна быть некоторая логика получения способа уведомления пользователя о покупке
        $communication = new Email();

        $security = new Security($this->session);
        $fullPrice = 0;
        $basket = [];
        $basketClass = new Basket($this->session);
        foreach ($basketClass->getProductsInfo() as $product) {
            $fullPrice += $product->getPrice();
            $basket[]=$product->getName();
        }
        (new FacadeCheckoutProcess)->checkoutProcess($basket, $fullPrice, $billing, $security, $communication, $discount);
    }
}
