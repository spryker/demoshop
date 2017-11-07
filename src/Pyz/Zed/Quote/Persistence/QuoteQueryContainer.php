<?php

namespace Pyz\Zed\Quote\Persistence;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractQueryContainer;

/**
 * @method \Pyz\Zed\Quote\Persistence\QuotePersistenceFactory getFactory()
 */
class QuoteQueryContainer extends AbstractQueryContainer
{

    /**
     * @param int $customerId
     *
     * @return $this|\Orm\Zed\Product\Persistence\PyzQuoteQuery
     */
    public function getQuote(int $customerId)
    {
        return $this->getFactory()
            ->createQuoteQuery()
            ->filterByFkCustomer($customerId);
    }

    /**
     * @param int $groupId
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomerAddressQuery|\Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroupToCustomerQuery|\Orm\Zed\Locale\Persistence\SpyLocaleQuery|\Orm\Zed\Newsletter\Persistence\SpyNewsletterSubscriberQuery|\Orm\Zed\Product\Persistence\PyzCartQuery|\Orm\Zed\Product\Persistence\PyzQuoteQuery|\Orm\Zed\User\Persistence\SpyUserQuery|\Orm\Zed\Wishlist\Persistence\SpyWishlistQuery
     */
    public function getAvailableQuotesForPurchaser(int $groupId, $customerId)
    {
        return $this->getFactory()
            ->createQuoteQuery()
            ->joinWithCustomer()
            ->useCustomerQuery()
                ->useSpyCustomerGroupToCustomerQuery()
                    ->filterByFkCustomerGroup($groupId)
                ->endUse()
            ->endUse()
            ->where(SpyCustomerTableMap::COL_ID_CUSTOMER .  ' != ' . $customerId);
    }

    /**
     * @param int $customerId
     *
     * @return $this|\Orm\Zed\Customer\Persistence\SpyCustomerQuery
     */
    public function getCustomer(int $customerId)
    {
        return $this->getFactory()
            ->createCustomerQuery()
            ->filterByIdCustomer($customerId);
    }

}