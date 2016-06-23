<?php

$i = new YvesAcceptanceTester($scenario);
$i->wantTo('See the homepage');
$i->amOnPage('/');
$i->seeElement('.shop-logo');
