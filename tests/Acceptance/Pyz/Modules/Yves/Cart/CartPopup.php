<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:49
 */

namespace tests\Acceptance\Pyz\Modules\Yves\Cart;
use tests\Acceptance\Pyz\Modules\Page;

/**
 * Class __NAME__
 * @package Acceptance\Pyz\Modules
 *
 */
class CartPopup extends Page
{

    /**
     * @param \Codeception\Scenario $scenario
     * @return CartPopup
     */
    public static function of($scenario) {
        return new CartPopup($scenario);
    }


    /**
     * @return $this
     */
    public function __METHOD___(/*  PARAMS */)
    {
        // actions //

        return $this;
    }
}