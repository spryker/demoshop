<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Form\DataProvider;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\StepEngine\Dependency\DataProvider\DataProviderInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection;

class SubFormDataProviders implements DataProviderInterface
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection
     */
    protected $subFormPlugins;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Form\SubFormPluginCollection $subFormPlugins
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     */
    public function __construct(SubFormPluginCollection $subFormPlugins, CartClientInterface $cartClient)
    {
        $this->subFormPlugins = $subFormPlugins;
        $this->cartClient = $cartClient;
    }

    /**
     * @return \Spryker\Shared\Transfer\AbstractTransfer
     */
    public function getData()
    {
        $quoteTransfer = $this->getDataClass();
        
        foreach ($this->subFormPlugins as $subForm) {
            $quoteTransfer = $subForm->createSubFormDataProvider()->getData();
        }

        return $quoteTransfer;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $options = [];
        foreach ($this->subFormPlugins as $subForm) {
            $options = array_merge(
                $options,
                $subForm->createSubFormDataProvider()->getOptions()
            );
        }

        return [
            'select_options' => $options
        ];
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    protected function getDataClass()
    {
        return $this->cartClient->getQuote();
    }

}
