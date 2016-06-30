<?php
/**
 * Created by PhpStorm.
 * User: marynaglukhodid
 * Date: 30/06/16
 * Time: 13:51
 */

namespace Acceptance\Pyz\Suits\Customer;

use Codeception\TestCase\Test;
use tests\Acceptance\Pyz\Modules\Zed\Customer\LoginPage;

/**
 * @group ZedHomepage
 */
class LoginTest extends Test
{

    /**
     * 1. User can not log in using an invalid Username
     * 
    */
    public function testLoginNegativeName()
    {
        LoginPage::of($this->scenario)
            ->wantTo('Login the system')
            ->amGoingTo('try to login with an NON valid NAME')
            ->expect('it is NOT possible')
            
            ->doLogin("*", "change123")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])

            ->doLogin(rand(10000, 99999).'@spryker.com', "change123")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])

            ->doLogin('', "change123")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])

            ->doLogin('admin%%%', "change123")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])
        ;
    }

    /**
     * 2. User can not log in using an invalid Surname
     */
    public function testLoginNegativePassword()
    {
        $username = 'admin@spryker.com';
        LoginPage::of($this->scenario)
            ->wantTo('Login the system')
            ->amGoingTo('try to log in with an NON valid PASSWORD')
            ->expect('it is NOT possible')

            ->doLogin($username, "*")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])

            ->doLogin($username, rand(3, 20))
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])

            ->doLogin($username, "ch**ge123")
            ->assertMessageBySelector('Authentication failed!', ['class' => 'alert-danger'])
        ;
    }

    public function testLoginPositive()
    {
        LoginPage::of($this->scenario)
            ->wantTo('Login the system')
            ->amGoingTo('try to login with an NON valid NAME')
            ->expect('it is NOT possible')

            ->doLogin("admin@spryker.com", "change123")
            ->assertNoMessageBySelector('Authentication failed!', ['class' => 'alert-danger']);
    }

}
