<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Form\DataProvider;

use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\StepEngine\Dependency\DataProvider\DataProviderInterface;

class DataProvider implements DataProviderInterface
{

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     */
    public function __construct(CartClientInterface $cartClient)
    {
        $this->cartClient = $cartClient;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [];
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData()
    {
        return $this->getDataClass();
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function getDataClass()
    {
        return $this->cartClient->getQuote();
    }

}
