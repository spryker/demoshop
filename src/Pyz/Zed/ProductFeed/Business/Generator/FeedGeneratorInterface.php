<?php

namespace Pyz\Zed\ProductFeed\Business\Generator;

interface FeedGeneratorInterface
{
    public function generateHtpasswd();
    public function generateHtaccess();
    public function generate();
}