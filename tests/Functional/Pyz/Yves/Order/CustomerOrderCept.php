<?php

$I = new NoGuy($scenario);
$I->setTestName('happy_checkout_customer');
$I->setDebugging(true);

$I->verifyHome();
$I->openDogsProductDetailPage();
$price = $I->addItemToBasket(21);

$I->doCustomerCheckout($price);