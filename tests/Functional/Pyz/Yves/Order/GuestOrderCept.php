<?php

$I = new NoGuy($scenario);
$I->setTestName('happy_checkout_guest');
$I->activateScreenshots(true);

$I->verifyHome();

$I->openDogsProductDetailPage();
$priceDogs = $I->addItemToBasket(3);

$I->openCatsProductDetailPage();
$priceCats = $I->addItemToBasket(19);

$I->doGuestCheckout($priceDogs + $priceCats);