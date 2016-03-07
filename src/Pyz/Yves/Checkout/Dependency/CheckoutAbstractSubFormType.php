<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Dependency;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

abstract class CheckoutAbstractSubFormType extends AbstractType
{

    const TEMPLATE_PATH = 'template_path';

    /**
     * @return string
     */
    abstract protected function getTemplatePath();

    /**
     * @param \Symfony\Component\Form\FormView $view The view
     * @param \Symfony\Component\Form\FormInterface $form The form
     * @param array $options The options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);

        $view->vars[self::TEMPLATE_PATH] = $this->getTemplatePath();
    }

}
