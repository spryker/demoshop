<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator implements
    Sao_Yves_Tracking_Component_Model_DoubleClick_Constants,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant
{
    /**
     * @var Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator
     */
    protected static $instance;

    /**
     * @var array
     */
    protected $parameters = array();

    /**
     * @return Sao_Yves_Tracking_Component_Model_DoubleClick_Aggregator
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class();
        }
        return self::$instance;
    }

    /**
     * @param $pageType
     */
    public function setPageType($pageType)
    {
        $this->parameters[self::DC_PAGE_TYPE] = $pageType;
    }

    /**
     * @return string
     */
    public function getPageType()
    {
        return isset($this->parameters[self::DC_PAGE_TYPE]) ? $this->parameters[self::DC_PAGE_TYPE] : '';
    }

    /**
     * @return array
     */
    public function getOrderItems()
    {
        return isset($this->parameters[self::DC_ORDER_PRODUCTS]) ? $this->parameters[self::DC_ORDER_PRODUCTS] : array();
    }

    /**
     * has to be set during checkout
     * @param Sao_Shared_Sales_Transfer_Order $orderTransfer
     */
    public function setOrderConfirmationInformation(Sao_Shared_Sales_Transfer_Order $orderTransfer)
    {
        $orderTransferTotalsClone =
            Generated_Shared_Library_TransferLoader::getSalesTotals(
                $orderTransfer->getTotals()->toArray()
            );
        $formattedTotalsClone = $this->formatTransferTotals($orderTransferTotalsClone);

        $totals = [
            //self::DC_ORDER_ID => $orderTransfer->getIdSalesOrder(),
            self::DC_TOTALS_AMOUNT_WITH_TAXES_WITH_SHIPPING       => $formattedTotalsClone->getGrandTotal(),
            self::DC_TOTALS_AMOUNT_WITH_TAXES_WITHOUT_SHIPPING    => $formattedTotalsClone->getSubtotalWithoutItemExpenses(),
            self::DC_TOTALS_DISCOUNT_WITH_TAXES                   => $formattedTotalsClone->getDiscount(),
            self::DC_TOTALS_FREIGHT_COSTS                         => $formattedTotalsClone->getFreightCosts(),
            self::DC_TOTALS_CUSTOMS_AND_DUTIES                    => $formattedTotalsClone->getCustomsAndDuties(),
            self::DC_TOTALS_AMOUNT_WITHOUT_TAXES_WITH_SHIPPING    => $formattedTotalsClone->getGrandTotal() - $formattedTotalsClone->getTax()->getTotalAmount(),
            self::DC_TOTALS_AMOUNT_WITHOUT_TAXES_WITHOUT_SHIPPING => $formattedTotalsClone->getSubtotalWithoutItemExpenses() - $formattedTotalsClone->getTax()->getTotalAmount(),
            self::DC_TOTALS_STATE_TAX                             => $formattedTotalsClone->getStateTaxAmount(),
        ];

        // this stuff has to be set
        if (!$orderTransfer->getIsManualCheckout()) {

            $order = [
                self::DC_ORDER_PAYMENT_METHOD => $orderTransfer->getPayment()->getMethod(),
                self::DC_ORDER_PROMO_CODE     => $orderTransfer->getCouponCode(),
                self::DC_ORDER_CURRENCY       => 'USD'
            ];

            $addTrans = [
                self::DC_ORDER_ORDER_ID    => $orderTransfer->getIncrementId(),
                self::DC_ORDER_STORE_NAME  => $this->getStoreName(),
                self::DC_ORDER_GRAND_TOTAL => $totals[self::DC_TOTALS_AMOUNT_WITH_TAXES_WITH_SHIPPING],
                self::DC_ORDER_TAX         => $totals[self::DC_TOTALS_STATE_TAX] + $totals[self::DC_TOTALS_CUSTOMS_AND_DUTIES],
                self::DC_ORDER_SHIPPING    => $totals[self::DC_TOTALS_FREIGHT_COSTS],
                self::DC_ORDER_CITY        => $orderTransfer->getBillingAddress()->getCity(),
                self::DC_ORDER_STATE       => $orderTransfer->getBillingAddress()->getRegion(),
                self::DC_ORDER_COUNTRY     => $orderTransfer->getBillingAddress()->getIso2Country(),
            ];

            $this->parameters[self::DC_ADD_TRANS] = $addTrans;
            $this->parameters[self::DC_ORDER] = $order;
            $this->parameters[self::DC_ORDER_TOTALS] = $totals;

        } else {

            $addTrans = [
                self::DC_ORDER_ORDER_ID    => $orderTransfer->getIncrementId(),
                self::DC_ORDER_STORE_NAME  => $this->getStoreName(),
                self::DC_ORDER_GRAND_TOTAL => $this->formatCurrency($orderTransfer->getTotals()->getSubtotalWithoutItemExpenses() - $orderTransfer->getTotals()->getDiscount()),
                self::DC_ORDER_TAX         => 0,
                self::DC_ORDER_SHIPPING    => 0,
                self::DC_ORDER_CITY        => $orderTransfer->getBillingAddress()->getCity(),
                self::DC_ORDER_STATE       => $orderTransfer->getBillingAddress()->getRegion(),
                self::DC_ORDER_COUNTRY     => $orderTransfer->getBillingAddress()->getIso2Country(),
            ];

            $this->parameters[self::DC_ADD_TRANS] = $addTrans;
        }

        $array = [];

        $groupedItems = Sao_Shared_Library_Sales_ItemGrouper::groupItemsByUniqueId($orderTransfer->getItems());
        foreach ($groupedItems as $transferItem) {
            /** @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
            $array[] = $this->convertTransferItemToArray($orderTransfer->getIncrementId(), $transferItem);
        }

        $this->parameters[self::DC_ORDER_PRODUCTS] = $array;
    }

    /**
     * @return string
     */
    protected function getStoreName()
    {
        return
            ProjectA_Shared_Library_Environment::getEnvironment() . DIRECTORY_SEPARATOR .
            ProjectA_Shared_Library_Store::getInstance()->getCurrentCountry() . DIRECTORY_SEPARATOR .
            ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage();
    }

    /**
     * @param $orderNumber
     * @param Sao_Shared_Sales_Transfer_Order_Item $transferItem
     * @return mixed
     */
    protected function convertTransferItemToArray($orderNumber, Sao_Shared_Sales_Transfer_Order_Item $transferItem)
    {
        $sku = $transferItem->getSku();

        $transferFrameOption = $this->getFrameOption($transferItem);
        if ($transferFrameOption) {
            $productNumber = $this->extractProductNumberFromSku($transferItem->getSku());
            $catalogIdentifier = $this->extractFrameIdentifierFromIdentifier($transferFrameOption->getIdentifier());
            $legacyFrameIdentifier =
                Sao_Shared_Library_Legacy_FrameOptionMapping::mapCatalogFromToLegacyFrame(
                    $catalogIdentifier,
                    $productNumber
                );
            $sku = $sku . '-F' . $legacyFrameIdentifier;
        }
        $transferProduct = $transferItem->getProduct();

        $itemArray[] = $orderNumber;
        $itemArray[] = $sku;
        $itemArray[] = $transferProduct->getName();
        $itemArray[] = ($transferProduct->getProductSet() === 'marketplace') ? 'original' : $transferProduct->getProductType() . '_print';
        $itemArray[] = $this->formatCurrency($transferItem->getGrossPrice());
        $itemArray[] = $transferItem->getQuantity();

        return $itemArray;
    }

    /**
     * @param $identifier
     * @return int
     */
    protected function extractFrameIdentifierFromIdentifier($identifier)
    {
        return (int)ltrim($identifier, 'F');
    }

    /**
     * @param $sku
     * @return int
     */
    protected function extractProductNumberFromSku($sku)
    {
        preg_match('/^P(\d+)-.*$/', $sku, $match);
        if ($match && !empty($match)) {
            return $match[1];
        }
        return 0;
    }

    /**
     * can take a argument list to filter the parameter list
     * @return array
     */
    public function getParameters()
    {
        if (func_num_args() > 0) {
            $parameters = array_intersect_key($this->parameters, array_flip(func_get_args()));
        } else {
            $parameters = $this->parameters;
        }
        return $parameters;
    }

    /**
     * @param $name
     * @return null
     */
    public function getParameter($name)
    {
        if (array_key_exists($name, $this->parameters)) {
            return $this->parameters[$name];
        }
        return null;
    }

    /**
     * @param array $values
     * @param string $separator
     * @param string $enclosure
     * @return string
     */
    public function arrayValuesToString(array $values, $separator = ',', $enclosure = '\'')
    {
        $glue = $enclosure . $separator . $enclosure;
        return $enclosure . implode($glue, $values) . $enclosure;
    }

    /**
     * @return bool
     */
    public function isSuccessPage()
    {
        return $this->getPageType() == self::PAGE_TYPE_CHECKOUT_CONFIRMATION;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Totals $totalsTransfer
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    protected function formatTransferTotals(Sao_Shared_Sales_Transfer_Totals $totalsTransfer)
    {
        $subTotalFormatted = $this->formatCurrency($totalsTransfer->getSubtotal());
        $subTotalWithItemExpensesFormatted = $this->formatCurrency($totalsTransfer->getSubtotalWithoutItemExpenses());
        $grandTotalFormatted = $this->formatCurrency($totalsTransfer->getGrandTotal());
        $grandTotalWithoutDiscountsFormatted = $this->formatCurrency($totalsTransfer->getGrandTotalWithoutDiscounts());
        $grandTotalNetFormatted = $this->formatCurrency($totalsTransfer->getGrandTotalNet());
        $discountFormatted = $this->formatCurrency($totalsTransfer->getDiscount());
        $itemExpensesTotalFormatted = $this->formatCurrency($totalsTransfer->getItemExpensesTotal());
        $orderExpensesTotalFormatted = $this->formatCurrency($totalsTransfer->getOrderExpensesTotal());
        $stateTaxAmountFormatted = $this->formatCurrency($totalsTransfer->getStateTaxAmount());
        $freightCostsFormatted = $this->formatCurrency($totalsTransfer->getFreightCosts());
        $customsAndDutiesFormatted = $this->formatCurrency($totalsTransfer->getCustomsAndDuties());

        $totalsTransfer->setSubtotal($subTotalFormatted);
        $totalsTransfer->setSubtotalWithoutItemExpenses($subTotalWithItemExpensesFormatted);
        $totalsTransfer->setGrandTotal($grandTotalFormatted);
        $totalsTransfer->setGrandTotalWithoutDiscounts($grandTotalWithoutDiscountsFormatted);
        $totalsTransfer->setGrandTotalNet($grandTotalNetFormatted);
        $totalsTransfer->setDiscount($discountFormatted);
        $totalsTransfer->setItemExpensesTotal($itemExpensesTotalFormatted);
        $totalsTransfer->setOrderExpensesTotal($orderExpensesTotalFormatted);
        $totalsTransfer->setStateTaxAmount($stateTaxAmountFormatted);
        $totalsTransfer->setFreightCosts($freightCostsFormatted);
        $totalsTransfer->setCustomsAndDuties($customsAndDutiesFormatted);

        $taxTransfer = $totalsTransfer->getTax();
        $taxTotalAmountFormatted = $this->formatCurrency($taxTransfer->getTotalAmount());
        $taxTransfer->setTotalAmount($taxTotalAmountFormatted);
        /* @var $taxRateTransfer Sao_Shared_Sales_Transfer_Tax_Item */
        foreach ($taxTransfer->getTaxRates() as $taxRateTransfer) {
            $taxAmountFormatted = $this->formatCurrency($taxRateTransfer->getAmount());
            $taxRateTransfer->setAmount($taxAmountFormatted);
        }
        return $totalsTransfer;
    }

    /**
     * @param int $value
     * @return string
     */
    protected function formatCurrency($value)
    {
        return number_format($value / 100, 2, '.', '');
    }

    protected function __clone()
    {
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $transferItem
     * @return null|Sao_Shared_Sales_Transfer_Order_Item_Option
     */
    protected function getFrameOption(Sao_Shared_Sales_Transfer_Order_Item $transferItem)
    {
        if ($transferItem->getOptions()->count()) {
            /** @var $option Sao_Shared_Sales_Transfer_Order_Item_Option */
            foreach ($transferItem->getOptions() as $option) {
                if ($option->getType() === ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME) {
                    return $option;
                }
            }
        }
        return null;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Discount_Collection $discountCollection
     * @return int
     */
    protected function sumDiscounts(Sao_Shared_Sales_Transfer_Discount_Collection $discountCollection)
    {
        $sum = 0;
        /** @var $discount Sao_Shared_Sales_Transfer_Discount */
        foreach ($discountCollection as $discount) {
            $sum += $discount->getAmount();
        }
        return $sum;
    }
}
