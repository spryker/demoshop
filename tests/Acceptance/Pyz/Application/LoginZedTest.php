<?php

namespace Acceptance\Pyz\Application;

use Codeception\TestCase\Test;

/**
 * @group ZedHomepage
 */
class HomepageZedTest extends Test
{

    public function iAmLoggedIn(\AcceptanceTester $i, $username = 'admin@spryker.com', $password = 'change123')
    {
        $i->amOnPage('/auth/login');
        $i->fillField('auth[username]', $username);
        $i->fillField('auth[password]', $password);
        $i->click('Login');
    }

    public function executeLogin(\AcceptanceTester $i, $rUsername, $rPassword)
    {
        $i->fillField('auth[username]', $rUsername);
        $i->fillField('auth[password]', $rPassword);
        $i->click('Login');
    }

    /**
     * 1. User can not log in using an invalid Username
     */
    public function testLoginNegativeName()
    {
        $i = new \AcceptanceTester($this->scenario);
        $i->wantTo('Login the system');
        $i->amGoingTo('try to login with an NON valid NAME');
        $i->expect('it is NOT possible');

        $i->amOnPage('/auth/login/');

        $username = rand(10000, 99999).'@spryker.com';
        $password = 'change123';

        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');

        $username = '*@spryker.com';
        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');

        $username = '';
        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');

        $username = 'admin%%%';
        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');
    }

    /**
     * 2. User can not log in using an invalid Surname
     */
    public function testLoginNegativePassword()
    {
        $i = new \AcceptanceTester($this->scenario);
        $i->wantTo('Login the system');
        $i->amGoingTo('try to log in with an NON valid PASSWORD');
        $i->expect('it is NOT possible');

        $i->amOnPage('/auth/login/');

        $username = 'admin@spryker.com';
        $password = '*';

        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');

        $password = rand(3,20);
        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');

        $password = 'ch**ge123';
        $this->executeLogin($i, $username, $password);
        $i->canSee('Authentication failed!', '//div[@class="alert alert-danger"]');
    }
    
    
}
