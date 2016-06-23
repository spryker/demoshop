<?php

$i = new ZedAcceptanceTester($scenario);

$i->wantTo('Logout from Zed');
$i->iAmLoggedIn();
$i->amOnPage('/');
$i->dontSeeElement('.spryker-login');
$i->click('Log out');
$i->seeCurrentUrlEquals('/auth/login');
