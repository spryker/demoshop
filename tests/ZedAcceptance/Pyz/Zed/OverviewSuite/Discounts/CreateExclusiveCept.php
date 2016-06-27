<?php
$I = new ZedAcceptanceTester($scenario);
$I->am('Admin User');
$I->wantTo('Create exclusive discount.');
$I->lookForwardTo('Discount is successfully applied in Yves');
$I->iAmLoggedIn();
$I->amOnPage('discount/index/list');
$I->click('Create new Discount');
$I->selectOption('#discount_discountGeneral_discount_type', 'Cart rule');
$I->fillField('#discount_discountGeneral_display_name', 'TestExclusiveDiscount');
$I->fillField('#discount_discountGeneral_description', 'Test Discount Information');
$I->click('#discount_discountGeneral_is_exclusive_1');
$I->click('Discount calculation');
$I->selectOption('#discount_discountCalculator_calculator_plugin', 'Calculator fixed');
$I->fillField('#discount_discountCalculator_amount', '25,25');
$I->click('btn-calculation-get');
$I->fillField('#discount_discountCalculator_collector_query_string', '( ( ( attribute.gps = \'TRUE\' AND attribute.weight CONTAINS \'9\' )  OR ( attribute.color != \'White\' AND attribute.storage = \'4 GB\' )) AND attribute.variant_id DOES NOT CONTAIN \'3\' )  OR attribute.color = \'White\' OR attribute.design = \'Turm\'');
$I->click('#create-discount-button');
$I->dontSee('could not be identified by specification builder.');
$I->click('Conditions');
$I->canSee('Define when to apply the discount');
$I->fillField('#discount_discountCondition_decision_rule_query_string', '( ( ( day-of-week = \'3\' AND item-quantity >= \'5\' )  OR ( attribute.color = \'White\' )  )  AND month = \'6\' )  OR attribute.color = \'Red,White\'');
$I->dontSee('could not be identified by specification builder.');
$I->click('#create-discount-button');
$I->canSee('Discount successfully created, but not activated.');



