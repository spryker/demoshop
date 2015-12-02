<?php


namespace Pyz\Zed\CalculationCheckoutConnector\Communication;

use SprykerFeature\Zed\CalculationCheckoutConnector\Business\CalculationCheckoutConnectorDependencyContainer as SprykerCalculationCheckoutConnectorDependencyContainer;
use Pyz\Zed\CalculationCheckoutConnector\CalculationCheckoutConnectorDependencyProvider;
use Pyz\Zed\Glossary\Business\GlossaryFacade;

class CalculationCheckoutConnectorDependencyContainer extends SprykerCalculationCheckoutConnectorDependencyContainer
{

    /**
     * @return GlossaryFacade
     */
    public function getGlossaryFacade()
    {
        return $this->getProvidedDependency(CalculationCheckoutConnectorDependencyProvider::FACADE_GLOSSARY);
    }

}
