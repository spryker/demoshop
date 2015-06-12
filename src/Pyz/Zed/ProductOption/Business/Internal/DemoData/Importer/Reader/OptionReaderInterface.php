<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

interface OptionReaderInterface
{

    /**
     * @yreturn OptionType[]
     */
    public function getOptions();
}
