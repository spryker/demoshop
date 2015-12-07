<?php

$I = new NoGuy($scenario);
$I->setTestName('happy_checkout_guest');
$I->activateScreenshots(true);

$I->verifyHome();
$I->openDogsProductDetailPage();
$price = $I->addItemToBasket(21);

$I->doCustomerCheckout($price);