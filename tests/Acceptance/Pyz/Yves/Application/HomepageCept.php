<?php

$i = new AcceptanceTester($scenario);
$i->wantTo('See the homepage');
$i->amOnPage('/');
$i->seeElement('.shop-logo');
