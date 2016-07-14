<?php

use Codeception\Scenario;

class ZedAcceptanceTester extends AcceptanceTester
{

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $i = $this;
        $i->amZed();
    }

        /**
         * @param string $username
         * @param string $password
         *
         * @return void
         */
    public function iAmLoggedIn($username = 'admin@spryker.com', $password = 'change123')
    {
        $this->amOnPage('/auth/login');
        $this->fillField('auth[username]', $username);
        $this->fillField('auth[password]', $password);
        $this->click('Login');
    }

}
