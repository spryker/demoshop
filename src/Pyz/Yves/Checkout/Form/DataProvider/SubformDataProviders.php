<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Form\DataProvider;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface;

class SubformDataProviders implements DataProviderInterface
{
    /**
     * @var array|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[]
     */
    protected $subFormPlugins;

    /**
     * @param array|\Pyz\Yves\Checkout\Dependency\Plugin\CheckoutSubFormPluginInterface[] $subformPlugins
     */
    public function __construct(array $subformPlugins)
    {
        $this->subFormPlugins = $subformPlugins;
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

        return ['select_options' => $productOptions];
    }
}
