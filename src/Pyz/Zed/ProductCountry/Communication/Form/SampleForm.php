<?php

namespace Pyz\Zed\ProductCountry\Communication\Form;

use SprykerFeature\Zed\Gui\Communication\Form\AbstractForm;

class SampleForm extends AbstractForm
{

    const SAMPLE_DATA = 'sample_data';

    /**
     * @return self
     */
    protected function buildFormFields()
    {
        return $this->addTextarea(self::SAMPLE_DATA, [
            'constraints' => [
                $this->getConstraints()->createConstraintNotBlank(),
            ],
        ]);
    }

    /**
     * @return array
     */
    protected function populateFormFields()
    {
        $fields = $this->getDefaultFormFields();

        return $fields;
    }

    /**
     * @return array
     */
    protected function getDefaultFormFields()
    {
        return [
            self::SAMPLE_DATA => null,
        ];
    }

}
