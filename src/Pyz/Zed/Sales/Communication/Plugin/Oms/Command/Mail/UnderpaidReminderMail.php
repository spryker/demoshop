<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command\Mail;

use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use ProjectA\Zed\Payone\Communication\Plugin\Oms\StateMachineConstants;
use ProjectA\Zed\Sales\Communication\Plugin\Oms\Command\AbstractMail;
use Pyz\Zed\Mail\Business\Model\MailTypesConstantInterface;
use ProjectA\Shared\Library\Currency\CurrencyManager;

class UnderpaidReminderMail extends AbstractMail implements CommandByOrderInterface
{

    /**
     * @param array $orderItems
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array|void
     */
    public function run(
        array $orderItems,
        \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity,
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
