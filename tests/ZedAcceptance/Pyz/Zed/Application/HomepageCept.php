<?php

$i = new ZedAcceptanceTester($scenario);
$i->wantTo('See the homepage');
$i->amOnPage('/');
$i->seeElement('.spryker-login');
