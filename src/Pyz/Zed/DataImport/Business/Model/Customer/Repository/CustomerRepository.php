<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Customer\Repository;

use Orm\Zed\Customer\Persistence\SpyCustomerQuery;
use Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException;

class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var int[] Keys are customer references, values are customer IDs.
     */
    protected static $idCustomerBuffer = [];

    /**
     * @param string $reference
     *
     * @return int
     */
    public function getIdByCustomerReference($reference)
    {
        if (!isset(static::$idCustomerBuffer[$reference])) {
            $this->resolveCustomerByReference($reference);
        }

        return static::$idCustomerBuffer[$reference];
    }

    /**
     * @param string $reference
     *
     * @throws \Pyz\Zed\DataImport\Business\Exception\EntityNotFoundException
     *
     * @return void
     */
    private function resolveCustomerByReference($reference)
    {
        $customerEntity = SpyCustomerQuery::create()
            ->findOneByCustomerReference($reference);

        if (!$customerEntity) {
            throw new EntityNotFoundException(sprintf('Customer by reference "%s" not found.', $reference));
        }

        static::$idCustomerBuffer[$reference] = $customerEntity->getIdCustomer();
    }
}
