<?php

namespace Pyz\Yves\Checkout\Form;

use Spryker\Shared\Gui\Form\AbstractForm;

abstract class AbstractCheckoutSubForm extends AbstractForm
{

    /**
     * @return string
     */
    abstract public function getPropertyPath();

}
