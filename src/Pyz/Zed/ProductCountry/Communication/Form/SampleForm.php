<?php

namespace Pyz\Zed\ProductCountry\Communication\Form;

use SprykerFeature\Zed\Gui\Communication\Form\AbstractForm;

class SampleForm extends AbstractForm
{

    /**
     * @return self
     */
    protected function buildFormFields()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function populateFormFields()
    {
        return $this->getDefaultFormFields();
    }

    /**
     * @return array
     */
    protected function getDefaultFormFields()
    {
        return [];
    }

}
