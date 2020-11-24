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


class FacadeCheckoutProcess {

    function checkoutProcess($basket, $fullPrice, $billing, $security, $communication, $discount) {
        $basketBuilder = new BasketBuilder();
        $basketBuilder->setBasket($basket);
        $basketBuilder->setFullPrice($fullPrice);
        $basketBuilder->setBilling($billing);
        $basketBuilder->setSecurity($security);
        $basketBuilder->setCommunication($communication);
        $basketBuilder->setDiscount($discount);
        $checkout= $basketBuilder->build();
        $checkout->checkoutProcess();

    }
}
