<?php
/**
 * Copyright © 2018-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\AlexaBot\Plugin;

interface AlexaProductPluginInterface
{
    /**
     * @param int $abstractId
     * @return array
     */
    public function getConcreteListByAbstractId($abstractId);

    /**
     * @param int $abstractId
     * @param string $variantName
     * @return string
     */
    public function getConcreteSkuByAbstractIdAndVariant($abstractId, $variantName);

    /**
     * @param string $concreteSku
     * @return bool
     */
    public function addConcreteToCartBySku($concreteSku);

    /**
     * @return bool
     */
    public function performCheckout();
}
