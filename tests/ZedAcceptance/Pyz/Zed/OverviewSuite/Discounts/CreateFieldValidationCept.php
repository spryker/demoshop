<?php

$I = new ZedAcceptanceTester($scenario);
$I->am('Admin User');
$I->wantTo('Create discount with empty fields');
$I->lookForwardTo('Discount is not saved');
$I->iAmLoggedIn();
$I->amOnPage('discount/index/list');
$I->click('Create new Discount');
$I->seeOptionIsSelected(['id' => 'discount_discountGeneral_discount_type'], 'Cart rule');
$I->seeCheckboxIsChecked('#discount_discountGeneral_is_exclusive_0');
$I->click('Discount calculation');
$I->seeOptionIsSelected(['id' => 'discount_discountCalculator_calculator_plugin'], 'Calculator fixed');
$I->click('create-discount-button');
$I->see('This value should not be blank.');
$I->click('General information');
$I->see('Name* (A unique name that will be displayed to your customers)');


