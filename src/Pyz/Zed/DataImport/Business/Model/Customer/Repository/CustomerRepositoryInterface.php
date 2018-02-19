<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Customer\Repository;

interface CustomerRepositoryInterface
{
    /**
     * @param string $key
     *
     * @return int
     */
    public function getIdByCustomerReference($key);
}
