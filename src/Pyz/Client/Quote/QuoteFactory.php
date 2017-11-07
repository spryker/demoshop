<?php

namespace Pyz\Client\Quote;

use Pyz\Client\Quote\Zed\QuoteZedStub;
use Spryker\Client\Quote\QuoteFactory as SprykerQuoteFactory;

class QuoteFactory extends SprykerQuoteFactory
{

    /**
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    public function createQuoteStub()
    {
        return new QuoteZedStub($this->getProvidedDependency(QuoteDependencyProvider::CLIENT_ZED_REQUEST));
    }

}