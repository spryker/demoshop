<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Login;

use Acceptance\Login\Zed\PageObject\LoginPage;
use Acceptance\Login\Zed\Tester\LoginTester;

/**
 * @group Zed
 * @group Login
 */
class LoginCest
{

    /**
     * @group positive
     * @group single
     *
     * @param \Acceptance\Login\Zed\Tester\LoginTester $i
     *
     * @return void
     */
    public function testLoginWithValidCredentialsShouldRedirectToHomepage(LoginTester $i)
    {
        $i->wantTo('Login the system');
        $i->amGoingTo('try to login with an NON valid NAME');
        $i->expect('it is NOT possible');

        $i->doLogin(LoginPage::ADMIN_USERNAME, LoginPage::ADMIN_PASSWORD);
        $i->dontSee(LoginPage::AUTHENTICATION_FAILED);
    }

    /**
     * @group negative
     *
     * @param \Acceptance\Login\Zed\Tester\LoginTester $i
     *
     * @return void
     */
    public function testLoginWithInvalidUsernameShouldShowErrorMessage(LoginTester $i)
    {
        $i->wantTo('Login the system');
        $i->amGoingTo('try to login with an invalid username');
        $i->expect('it is NOT possible');

        $i->doLogin('*', LoginPage::ADMIN_PASSWORD);
        $i->see(LoginPage::AUTHENTICATION_FAILED);

        $i->doLogin(rand(10000, 99999) . '@spryker.com', LoginPage::ADMIN_PASSWORD);
        $i->see(LoginPage::AUTHENTICATION_FAILED);

        $i->doLogin('admin%%%', LoginPage::ADMIN_PASSWORD);
        $i->see(LoginPage::AUTHENTICATION_FAILED);
    }

    /**
     * @group negative
     *
     * @param \Acceptance\Login\Zed\Tester\LoginTester $i
     *
     * @return void
     */
    public function testLoginWithInvalidPasswordShouldShowErrorMessage(LoginTester $i)
    {
        $i->wantTo('Login the system');
        $i->amGoingTo('try to log in with an invalid password');
        $i->expect('it is NOT possible');

        $i->doLogin(LoginPage::ADMIN_USERNAME, '*');
        $i->see(LoginPage::AUTHENTICATION_FAILED);

        $i->doLogin(LoginPage::ADMIN_USERNAME, rand(3, 20));
        $i->see(LoginPage::AUTHENTICATION_FAILED);

        $i->doLogin(LoginPage::ADMIN_USERNAME, 'ch**ge123');
        $i->see(LoginPage::AUTHENTICATION_FAILED);
    }

    /**
     * @group negative
     *
     * @param \Acceptance\Login\Zed\Tester\LoginTester $i
     *
     * @return void
     */
    public function testLoginWithoutUsernameShouldShowErrorMessageInFom(LoginTester $i)
    {
        $i->wantTo('Login the system');
        $i->amGoingTo('try to log in without username');
        $i->expect('show error message in form');

        $i->doLogin('', LoginPage::ADMIN_PASSWORD);
        $i->see(LoginPage::ERROR_MESSAGE_EMPTY_FIELD);
    }

    /**
     * @group negative
     *
     * @param \Acceptance\Login\Zed\Tester\LoginTester $i
     *
     * @return void
     */
    public function testLoginWithoutPasswordShouldShowErrorMessageInFom(LoginTester $i)
    {
        $i->wantTo('Login the system');
        $i->amGoingTo('try to log in without password');
        $i->expect('show error message in form');

        $i->doLogin(LoginPage::ADMIN_USERNAME, '');
        $i->see(LoginPage::ERROR_MESSAGE_EMPTY_FIELD);
    }

}
