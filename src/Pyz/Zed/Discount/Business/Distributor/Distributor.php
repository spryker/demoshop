<?php


namespace Pyz\Zed\Discount\Business\Distributor;

use Generated\Shared\Discount\DiscountInterface;
use SprykerFeature\Zed\Discount\Business\Model\DiscountableInterface;
use SprykerFeature\Zed\Discount\Business\Distributor\Distributor as SprykerDistributor;
use Pyz\SprykerBugfixInterface;

class Distributor extends SprykerDistributor implements SprykerBugfixInterface
{

    /**
     * @param DiscountableInterface[] $discountableObjects
     * @param DiscountInterface $discountTransfer
     *
     * @return void
     */
    public function distribute(array $discountableObjects, DiscountInterface $discountTransfer)
    {
        $totalGrossAmount = $this->getTotalGrossAmountOfDiscountableObjects($discountableObjects);
        if ($totalGrossAmount <= 0) {
            return;
        }

        $totalDiscountAmount = $discountTransfer->getAmount();
        if ($totalDiscountAmount <= 0) {
            return;
        }

        /*
         * There should not be a discount that is higher than the total gross price of all discountable objects
         */
        if ($totalDiscountAmount > $totalGrossAmount) {
            $totalDiscountAmount = $totalGrossAmount;
        }

        foreach ($discountableObjects as $discountableItemTransfer) {
            $singleItemGrossAmountShare = $discountableItemTransfer->getGrossPrice()  / $totalGrossAmount;

            $itemDiscountAmount = ($totalDiscountAmount * $singleItemGrossAmountShare) + $this->roundingError;
            $itemDiscountAmountRounded = round($itemDiscountAmount, 2);
            $this->roundingError = $itemDiscountAmount - $itemDiscountAmountRounded;

            $distributedDiscountTransfer = clone $discountTransfer;
            $distributedDiscountTransfer->setAmount($itemDiscountAmountRounded * $discountableItemTransfer->getQuantity());


            $discountableItemTransfer->getDiscounts()->append($distributedDiscountTransfer);
        }
    }

}
