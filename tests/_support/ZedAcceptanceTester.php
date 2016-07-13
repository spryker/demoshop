<?php

use Acceptance\Login\Zed\PageObject\LoginPage;
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
    public function amLoggedInUser($username = 'admin@spryker.com', $password = 'change123')
    {
        $i = $this;

        // This currently fails: https://github.com/Codeception/Codeception/issues/2900
//        if ($i->loadSessionSnapshot('LoginZed')) {
//            return;
//        }

        $i->amOnPage(LoginPage::URL);

        $i->fillField(LoginPage::SELECTOR_USERNAME_FIELD, $username);
        $i->fillField(LoginPage::SELECTOR_PASSWORD_FIELD, $password);
        $i->click(LoginPage::SELECTOR_SUBMIT_BUTTON);

        $i->saveSessionSnapshot('LoginZed');
    }

}
