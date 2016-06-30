<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:49
 */

namespace tests\Acceptance\Pyz\Modules\Zed\Customer;

use tests\Acceptance\Pyz\Modules\Page;

/**
 * Class LoginPage
 * @package Acceptance\Pyz\Modules
 * 
 */
class LoginPage extends Page
{
    
    /**
     * @param \Codeception\Scenario $scenario
     * @return self
     */
    public static function of($scenario) {
        return new self($scenario);
    }

    /**
     * @param string $rUsername
     * @param string $rPassword
     * @return $this
     */
    public function doLogin($rUsername, $rPassword)
    {
        $this->actor->amOnPage('/auth/login/');

        $this->actor->fillField('auth[username]', $rUsername);
        $this->actor->fillField('auth[password]', $rPassword);

        $this->actor->click('Login');

        return $this;
    }

}