<?php

namespace Acceptance\Pyz\Suites\DiscountPositiveTest;

use Codeception\TestCase\Test;
use tests\Acceptance\Pyz\Modules\Zed\Discount\Discount;
use tests\Acceptance\Pyz\Data\Zed\Discounts;

/**
 * @group
 */
class DiscountPositiveTest extends Test
{

    /**
     * 1. User can create exclusive discount
     *
     */
    public function testCreateExclusiveDiscountPositive()
    {
        Discount::of($this->scenario)
            ->wantTo('Create valid exclusive discount')
            ->expect('Exclusive discount is successfully created')

            ->doLogin("admin@spryker.com", "change123")

            ->openCreateDiscountPage()
            ->fillDiscount(Discounts::$discountData[])
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




