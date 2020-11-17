<?php

namespace Service\Order;

use Service\User\ISecurity;
use Service\Billing\IBilling;
use Service\Discount\IDiscount;
use Service\Communication\ICommunication;

class BasketBuilder
{
    /**
     *@var IDiscount
     */
    private $discount;

    /**
     *@var IBilling
     */
    private $billing;

    /** @var ISecurity */
    private $security;

    /** @var ICommunication */
    private $communication;

    /** @var float */
    private $fullPrice;

    /** @var array */
    private $basket;

    /**
    *   @param IDiscount $discount
    *   @return void
     */
    public function setDiscount($discount): void {
        $this->discount=$discount;
    }

/**
    *   @param array $basket
    *   @return void
     */
    public function setBasket($basket): void {
        $this->basket=$basket;
    }

/**
    *   @param float $fullPrice
    *   @return void
     */
    public function setFullPrice($fullPrice): void {
        $this->fullPrice=$fullPrice;
    }

    /**
    *   @param IBilling $billing
    *   @return void
     */
    public function setBilling($billing): void {
        $this->billing=$billing;
    }

    /**
    *   @param ISecurity $security
    *   @return void
     */
    public function setSecurity($security): void {
        $this->security=$security;
    }

    /**
    *   @param ICommunication $communication
    *   @return void
     */
    public function setCommunication($communication): void {
        $this->communication=$communication;
    }

    /**
     *@return IDiscount
     */
    public function getDiscount(): IDiscount {
        return $this->discount;
    }

    /**
     *@return IBilling
     */
    public function getBilling():IBilling {
        return $this->billing;
    }

    /**
     *@return ISecurity
     */
    public function getSecurity():ISecurity {
        return $this->security;
    }

    /**
     *@return ICommunication
     */
    public function getCommunication():ICommunication {
        return $this->communication;
    }

    /**
     *@return float
     */
    public function getFullPrice(): float {
        return $this->fullPrice;
    }

    /**
     *@return array
     */
    public function getBasket():array {
        return $this->basket;
    }

    /** @return CheckoutProcess */
    public function build(): CheckoutProcess {
        return new CheckoutProcess($this);
    }
}
