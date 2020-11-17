<?php


namespace Service\Order;

use Service\User\ISecurity;
use Service\Billing\IBilling;
use Service\Discount\IDiscount;
use Service\Communication\ICommunication;

class CheckoutProcess
{
/** @var float */
    private $fullPrice;

    /** @var array */
    private $basket;

    /**
     * @var IDiscount
     */
    private $discount;

    /**
     * @var ISecurity
     */
    private $security;

    /**
     * @var IBilling
     */
    private $billing;

    /**
     * @var ICommunication
     */
    private $communication;

    public function __construct(BasketBuilder $builder)
    {
        $this->discount = $builder->getDiscount();
        $this->security = $builder->getSecurity();
        $this->billing = $builder->getBilling();
        $this->communication = $builder->getCommunication();
        $this->basket=$builder->getBasket();
        $this->fullPrice=$builder->getFullPrice();
    }

    /**
     * Проведение всех этапов заказа
     *
     * @return void
     */
    public function checkoutProcess(): void
    {
        $user = $this->security->getUser();
        $this->discount = $this->discount->getDiscount($user, $this->fullPrice, $this->basket);
        $totalPrice = $this->fullPrice - $this->fullPrice / 100 * $this->discount;
        $this->billing->pay($totalPrice);
        $this->communication->process($user, 'checkout_template');
    }
}
