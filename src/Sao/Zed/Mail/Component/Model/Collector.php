<?php
/**
 * @version
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
abstract class Sao_Zed_Mail_Component_Model_Collector extends ProjectA_Zed_Mail_Component_Model_Collector implements
     ProjectA_Zed_Library_Dependency_Factory_Interface,
     ProjectA_Zed_Calculation_Component_Dependency_Facade_Interface,
     ProjectA_Zed_Invoice_Component_Dependency_Facade_Interface,
     Sao_Zed_Mail_Component_Model_Constants
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;
    use ProjectA_Zed_Calculation_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Invoice_Component_Dependency_Facade_Trait;

    /**
     * @param array $placeholderData
     * @return string
     * @throws ProjectA_Zed_Library_Exception
     */
    protected function getSubject(array $placeholderData = array())
    {
        $type = $this->getMailType();
        $templateEntity = $this->factory->getFacade()->getTemplateByName($type);
        if (!$templateEntity) {
            throw new ProjectA_Zed_Library_Exception('Template "' . $type . '" not found.');
        }
        return
            $this->factory->getFacade()->renderTemplate(
                $templateEntity,
                $placeholderData,
                Sao_Zed_Mail_Component_Model_Template::RENDER_SUBJECT
            );
    }

    /**
     * @param array $placeholders
     */
    protected function addPlaceholders(array $placeholders)
    {
        $this->mailTransfer->setReplacements(
            array_merge($this->mailTransfer->getReplacements(), $placeholders)
        );
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $orderAddressEntity
     * @return Sao_Shared_Mail_Transfer_Address
     */
    protected function getTransferMailAddress(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $orderAddressEntity)
    {
        $transferOrderAddress = Generated\Shared\Library\TransferLoader::getMailAddress();
        $transferOrderAddress = ProjectA_Zed_Library_Copy::entityToTransfer($transferOrderAddress, $orderAddressEntity);
        /* @var $transferOrderAddress Sao_Shared_Mail_Transfer_Address */
        $transferOrderAddress->setSalutation($orderAddressEntity->getSalutation());
        $transferOrderAddress->setCountryName($orderAddressEntity->getCountry()->getName());
        return $transferOrderAddress;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @return Sao_Shared_Sales_Transfer_Totals
     */
    protected function getOrderTotals(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $totalsTransfer = $this->facadeCalculation->getTotalsByOrder($orderEntity);
        $totalsTransferClone = Generated\Shared\Library\TransferLoader::getSalesTotals($totalsTransfer->toArray());
        return $this->formatTransferTotals($totalsTransferClone);
    }

    //TODO see tirendo stuff, a lot of what is in Pac_.. over there is missing in core crm
//    /**
//     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
//     * @return Sao_Shared_Sales_Transfer_Totals
//     */
//    protected function getInvoiceTotals(Entity_PacSalesOrder $orderEntity)
//    {
//        $invoiceEntity = $this->facadeInvoice->getInvoiceBySalesOrder($orderEntity);
//        $totalsTransfer = $this->facadeCalculation->getTotalsByInvoice($invoiceEntity);
//
//        return $this->formatTransferTotals($totalsTransfer);
//    }

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
        $freightCostsFormatted  = $this->formatCurrency($totalsTransfer->getFreightCosts());
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
        /* @var $taxRateTransfer Sao_Shared_Sales_Transfer_Tax_Item  */
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
        return ProjectA_Shared_Library_Currency::format((int) $value, true);
    }

    /**
     * Get locale specific date format
     * @param string $date
     * @return string
     */
    protected function getFormattedDate($date)
    {
        $formatter = new Zend_Date($date);
        return $formatter->get(Zend_Date::DATE_MEDIUM);
    }
}
