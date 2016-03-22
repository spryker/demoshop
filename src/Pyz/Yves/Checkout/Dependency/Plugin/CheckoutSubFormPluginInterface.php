<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Dependency\Plugin;

interface CheckoutSubFormPluginInterface
{

    /**
     *
     * @return \Pyz\Yves\Checkout\Dependency\SubFormInterface
     */
    public function createSubForm();

    /**
     * @return \Pyz\Yves\Checkout\Dependency\DataProvider\DataProviderInterface
     */
    public function createSubFormDataProvider();

}
