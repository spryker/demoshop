<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Dependency;

interface SubFormInterface
{

    const OPTIONS_FIELD_NAME = 'select_options';

    /**
     * @return string
     */
    public function getPropertyPath();

    /**
     * @return string
     */
    public function getName();

}
