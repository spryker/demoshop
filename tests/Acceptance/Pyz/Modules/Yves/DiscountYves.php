<?php

namespace tests\Acceptance\Pyz\Modules\Yves\Discount;

use tests\Acceptance\Pyz\Modules\Page;
use tests\Acceptance\Pyz\Data\Yves\DiscountsYves;

/**
 * Class DiscountYves
 *
 */
class DiscountYves extends Page
{
    /**
     * @param \Codeception\Scenario $scenario
     * @return self
     */
    public static function of($scenario)
    {
        return new self($scenario);
    }

    /**
     * Open Yves
     *
     * @return $this
     */
    public function openYves()
    {
        $this->actor->amOnUrl('http://www.de.spryker.dev/en/samsung-gear-s2-79');

        return $this;
    }

    /**
     * Add a product samsung-gear-s2-79 to the cart
     *
     * @return $this
     */
    public function addProductToCart()
    {
        $this->actor->click('.product__add-button');
        $this->actor->wait(2);

        return $this;
    }

   
}