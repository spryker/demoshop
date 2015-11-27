<?php

namespace Pyz\Zed\ProductGroupCheckoutConnector\Business\Order;

use Generated\Shared\Transfer\OrderTransfer;
use Orm\Zed\Sales\Persistence\PavSalesOrderItemConfiguration;
use Pyz\Zed\Glossary\Business\GlossaryFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\ProductGroup\Business\ProductGroupFacade;

class ProductGroupManager
{

    protected $productGroupFacade;
    protected $glossaryFacade;
    protected $currentLocale;

    /**
     * ProductGroupManager constructor.
     * @param ProductGroupFacade $productGroupFacade
     * @param GlossaryFacade $glossaryFacade
     * @param LocaleFacade $localeFacade
     */
    public function __construct(
        ProductGroupFacade $productGroupFacade,
        GlossaryFacade $glossaryFacade,
        LocaleFacade $localeFacade
    ) {
        $this->productGroupFacade = $productGroupFacade;
        $this->glossaryFacade = $glossaryFacade;
        $this->currentLocale = $localeFacade->getCurrentLocale();
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveOrderProductGroups(OrderTransfer $orderTransfer)
    {
        $orderItems = $orderTransfer->getItems();

        foreach ($orderItems as $orderItem) {
            $configuration = $orderItem->getItemConfiguration();
            foreach ($configuration as $configurationEntry) {
                $groupKey = $configurationEntry->getGroupKey();
                $productGroupTransfer = $this->productGroupFacade->getProductGroupByKey($groupKey);

                $groupKeyLocalized = $groupKey;
                $glossaryKey = $productGroupTransfer->getGlossaryKey();
                if ($glossaryKey) {
                    $groupKeyLocalized = $this->glossaryFacade->getTranslation(
                        $glossaryKey,
                        $this->currentLocale
                    )->getValue();
                }


                $productGroupValues = $this->productGroupFacade->getProductGroupValues($productGroupTransfer);
                $groupValuesLocalized = [];
                foreach ($productGroupValues as $productGroupValueTransfer) {
                    $glossaryKey = $productGroupValueTransfer->getGlossaryKey();
                    $producGroupValueLocalized = $productGroupValueTransfer->getValue();
                    if ($glossaryKey) {
                        $producGroupValueLocalized = $this->glossaryFacade->getTranslation(
                            $glossaryKey,
                            $this->currentLocale
                        )->getValue();
                    }

                    $groupValuesLocalized[$productGroupValueTransfer->getValue()] = $producGroupValueLocalized;
                }

                $groupValues = $configurationEntry->getGroupValues();

                foreach ($groupValues as $groupValue) {
                    $groupValueLocalized = $groupValue;
                    if (isset($groupValuesLocalized[$groupValue])) {
                        $groupValueLocalized = $groupValuesLocalized[$groupValue];
                    }
                    $saveItem = new PavSalesOrderItemConfiguration();
                    $saveItem
                        ->setGroupValue($groupValue)
                        ->setGroupKey($groupKey)
                        ->setGroupKeyLocalized($groupKeyLocalized)
                        ->setGroupValueLocalized($groupValueLocalized)
                        ->setFkSalesOrderItem($orderItem->getIdSalesOrderItem());
                    $saveItem->save();

                }

            }
        }
    }
}
