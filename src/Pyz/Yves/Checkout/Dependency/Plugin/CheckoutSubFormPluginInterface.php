<?php

namespace Pyz\Yves\Checkout\Dependency\Plugin;

interface CheckoutSubFormPluginInterface
{

    /**
     *
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    public function createSubFrom();

    /**
     * @return \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider();

}
