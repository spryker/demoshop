<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command\Mail;

use SprykerFeature\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use SprykerFeature\Zed\Payone\Communication\Plugin\Oms\StateMachineConstants;
use SprykerFeature\Zed\Sales\Communication\Plugin\Oms\Command\AbstractMail;
use Pyz\Zed\Mail\Business\Model\MailTypesConstantInterface;
use SprykerFeature\Shared\Library\Currency\CurrencyManager;

class UnderpaidReminderMail extends AbstractMail implements CommandByOrderInterface
{

    /**
     * @param array $orderItems
     * @param \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array|void
     */
    public function run(
        array $orderItems,
        \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder $orderEntity,
        ReadOnlyArrayObject $data
    ) {
        $transactionStatusRequest = $context[StateMachineConstants::STATEMACHINE_CONTEXT_TRANSACTION_STATUS_REQUEST];
        $currencyManager = CurrencyManager::getInstance();
        $balance = $transactionStatusRequest->getBalance();
        $grandTotal = $orderEntity->getGrandTotal();

        $underpaidAmount = abs($balance);
        $missingAmount = $grandTotal - $underpaidAmount;

        $underpaidAmount = $currencyManager->convertCentToDecimal($underpaidAmount);
        $underpaidAmount = $currencyManager->format($underpaidAmount);

        $missingAmount = $currencyManager->convertCentToDecimal($missingAmount);
        $missingAmount = $currencyManager->format($missingAmount);

        $additionalMailData = ['underpaid_amount' => $underpaidAmount,
                               'missing_amount' => $missingAmount];

        $mailTransfer = $this->facadeMail->buildUnderpaidPaymentTransfer(MailTypesConstantInterface::UNDERPAID_CONFIRMATION, $orderEntity, $additionalMailData, false);
        $result = $this->facadeMail->sendMail($mailTransfer);
        $this->handleResponse($result, $mailTransfer, $orderEntity);
    }
}
