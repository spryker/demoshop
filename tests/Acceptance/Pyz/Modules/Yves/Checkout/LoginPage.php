<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:49
 */

namespace tests\Acceptance\Pyz\Modules\Yves\Checkout;

use tests\Acceptance\Pyz\Modules\Page;

/**
 * Class __NAME__
 * @package Acceptance\Pyz\Modules
 *
 */
class LoginPage extends Page
{

    /**
     * @param \Codeception\Scenario $scenario
     * @return LoginPage
     */
    public static function of($scenario) {
        return new LoginPage($scenario);
    }
}
