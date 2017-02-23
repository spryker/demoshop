<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

interface CartOperationInterface
{

    /**
     * @param string $sku
     * @param int $quantity
     * @param array $optionValueUsageIds
     *
     * @return void
     */
    public function add($sku, $quantity, $optionValueUsageIds = []);

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function remove($sku, $groupKey = null);

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function increase($sku, $groupKey = null);

    /**
     * @param string $sku
     * @param string|null $groupKey
     *
     * @return void
     */
    public function decrease($sku, $groupKey = null);

    /**
     * @param string $sku
     * @param int $quantity
     * @param string|null $groupKey
     *
     * @return void
     */
    public function changeQuantity($sku, $quantity, $groupKey = null);

}
