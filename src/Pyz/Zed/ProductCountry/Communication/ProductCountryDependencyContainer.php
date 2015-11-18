<?php

namespace Pyz\Zed\ProductCountry\Communication;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductCountryCommunication;
use Pyz\Zed\ProductCountry\Communication\Form\SampleForm;
use SprykerEngine\Zed\Kernel\Communication\AbstractCommunicationDependencyContainer;

/**
 * @method ProductCountryCommunication getFactory
 */
class ProductCountryDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @return SampleForm
     */
    public function createCategoryFormAdd()
    {
        return $this->getFactory()->createFormSampleForm();
    }

}
