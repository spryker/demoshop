<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Form\DataProvider;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\StepEngine\Dependency\DataProvider\DataProviderInterface;
use Spryker\Yves\StepEngine\Dependency\Plugin\Form\CheckoutSubFormPluginCollection;

class SubFormDataProviders implements DataProviderInterface
{

    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Form\CheckoutSubFormPluginCollection
     */
    protected $subFormPlugins;

    /**
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Form\CheckoutSubFormPluginCollection $subFormPlugins
     */
    public function __construct(CheckoutSubFormPluginCollection $subFormPlugins)
    {
        $this->subFormPlugins = $subFormPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getData(QuoteTransfer $quoteTransfer)
    {
        foreach ($this->subFormPlugins as $subForm) {
            $quoteTransfer = $subForm->createSubFormDataProvider()->getData($quoteTransfer);
        }

        return $quoteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getOptions(QuoteTransfer $quoteTransfer)
    {
        $productOptions = [];
        foreach ($this->subFormPlugins as $subForm) {
            $productOptions = array_merge(
                $productOptions,
                $subForm->createSubFormDataProvider()->getOptions($quoteTransfer)
            );
        }

        return [
            'select_options' => $productOptions
        ];
    }

}
