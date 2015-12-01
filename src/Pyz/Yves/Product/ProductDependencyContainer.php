<?php

namespace Pyz\Yves\Product\Communication;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use SprykerFeature\Client\Product\Service\ProductClient;

class ProductDependencyContainer extends AbstractCommunicationDependencyContainer
{
    /**
     * @return ProductClient
     */
    public function createProductClient()
    {
        return $this->getLocator()->product()->client();
    }
}
