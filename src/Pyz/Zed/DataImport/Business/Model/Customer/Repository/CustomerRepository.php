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
    const ID_CUSTOMER = 'idCustomer';

    /**
     * @var array
     */
    protected static $resolved = [];

    /**
     * @param string $reference
     *
     * @return int
     */
    public function getIdByCustomerReference($reference)
    {
        if (!isset(static::$resolved[$reference])) {
            $this->resolveCustomerByReference($reference);
        }

        return static::$resolved[$reference][static::ID_CUSTOMER];
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

        static::$resolved[$reference] = [
            static::ID_CUSTOMER => $customerEntity->getIdCustomer(),
        ];
    }
}
