<?php

namespace Acceptance\Pyz\Application;

use Codeception\TestCase\Test;
use \AcceptanceTester as AcceptanceTester;

/**
 * @group DiscountsPositive
 */
class DiscountPositiveScenariosTest extends Test
{

    /**
     * 1. User can create exclusive discount and it is successfully applied to the product in Yves
     */
    public function testCreateExclusiveDiscountPositive()
    {
        $i = new AcceptanceTester($this->scenario);
        $i->wantTo('Create valid exclusive discount');
        $i->expect('Exclusive discount is successfully created');

        /**
         * TEST DATA
         */
        $one_item_price = '9,18';
        $two_items_price = '18,36';
        $discount_amount_one = '2,30';
        $discount_amount_two = '4,59';
        $discount_total_one = '6,88';
        $discount_total_two = '13,77';
        $date = date("Y-m-d", strtotime('tomorrow'));;
        $day_number = date('N');
        $discount = array(
            'type' => 'Cart rule',
            'name' => 'ExclusiveDiscount1',
            'desc' => 'Test Exclusive Discount text',
            'excl' => '1',
            'valid_from' => '2016-01-01',
            'valid_to' => $date,
            'calc_type' => 'Calculator percentage',
            'amount' => '25',
            'apply_to' => 'attribute.gps = \'TRUE\'',
            'apply_when' => 'day-of-week = \'' . $day_number . '\''
        );

        /**
         * PRE_CONDITIONS
         */
        $i->executeLogin();


        LoginPage::of($this->scenario)
            ->doLogin('admin@spryker.com', 'change123');

        /**
         * Creation of exclusive discount
         */
        $i->createDiscount($discount);
        $i->see('Discount successfully created, but not activated.', ['class' => 'alert-success']);
        $i->click(['css' => 'a.btn-sm:nth-child(1)']);
        $i->wait(2);
        $i->see('Discount successfully activated.', ['class' => 'alert-success']);

        /**
         * Check in Yves that discount is correctly applied
         */
        $i->amOnUrl('http://www.de.spryker.dev/en/samsung-gear-s2-79');
        $i->click('.product__add-button');
        $i->wait(2);

        $i->see($one_item_price.' €',['css' => '.cart__item-price']);
        $i->see($discount['name'].' - ('.$discount_amount_one.' €)',['css' => '#cart-overlay > div:nth-child(3)']);
        $i->see('-'.$discount_amount_one, ['css' => 'div.cart__total-price:nth-child(2)']);
        $i->see($discount_total_one, ['css' => 'div.cart__total-price:nth-child(4)']);
        $i->click(['css' => 'input.spinner__increment:nth-child(4)']);
        $i->wait(2);

        $i->see($two_items_price.' €',['css' => '.cart__item-price']);
        $i->see($discount['name'].' - ('.$discount_amount_two.' €)',['css' => '#cart-overlay > div:nth-child(3)']);
        $i->see('-'.$discount_amount_two, ['css' => 'div.cart__total-price:nth-child(2)']);
        $i->see($discount_total_two, ['css' => 'div.cart__total-price:nth-child(4)']);

        $i->makeScreenshot('error');
        $i->click(['class' => 'cta']);

        $customerMail='test@test.com';
        $i->checkoutAsGuestYves($customerMail);
        $i->see('$item_price',['css' => '//div[4]/table/tbody/tr/td[2]']);
        $i->see('- '.$discount_amount_two.' €',['css' => '//tr[2]/td[2]']);
        $i->click('#summaryForm_checkout.step.place.order');
        $i->wait(1);
        $i->see('Your order has been placed successfully!',['css' => 'h1']);

        /**
         * Check in Zed that order has been successfully created
         */
        $i->amOnPage('/sales');
        $i->fillField(['css'=> 'input.form-control.input-sm'], $customerMail);
        $i->click(['link' => 'View']);
        $i->waitForText('Order Overview');
        $i->see('- '.$discount_amount_two.' €',['css' => '//tr[2]/td[2]']);

        /**
         * POST_CONDITIONS
         */
        $i->amOnPage('/discount/index/list');
        $i->fillField('#input.input-sm', $discount['name']);
        $i->click(['css' => 'button.btn:nth-child(3)']);
    }
}

