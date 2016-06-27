<?php

$i = new ZedAcceptanceTester($scenario);

$i->wantTo('Login into Zed');
$i->amOnPage('/');
$i->seeElement('.spryker-login');
$i->seeCurrentUrlEquals('/auth/login');
$i->fillField('auth[username]', 'admin@spryker.com');
$i->fillField('auth[password]', 'change123');
$i->click('Login');
$i->seeCurrentUrlEquals('/');
$i->dontSeeElement('.spryker-login');
