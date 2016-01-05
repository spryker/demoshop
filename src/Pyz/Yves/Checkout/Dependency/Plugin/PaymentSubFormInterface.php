<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

interface PaymentSubFormInterface
{

    /**
     * @return mixed
     */
    public function createSubFrom();

}
