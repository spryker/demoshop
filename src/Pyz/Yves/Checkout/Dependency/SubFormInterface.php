<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Dependency;

interface SubFormInterface
{
    /**
     * @return string
     */
    public function getPropertyPath();

    /**
     * @return string
     */
    public function getName();

}
