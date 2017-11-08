<?php

namespace Pyz\Zed\Quote\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class QuoteBusinessFactory extends AbstractBusinessFactory
{

    /**
     * @return Writer
     */
    public function createWriter()
    {
        return new Writer($this->getQueryContainer());
    }

    /**
     * @return Reader
     */
    public function createReader()
    {
        return new Reader($this->getQueryContainer());
    }

}