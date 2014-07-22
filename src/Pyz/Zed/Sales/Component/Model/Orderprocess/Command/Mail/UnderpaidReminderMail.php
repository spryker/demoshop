<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Command\Mail;

use ProjectA\Zed\Oms\Component\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Component\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Sales\Component\Model\Orderprocess\Command\AbstractMail;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;
use Pyz\Zed\Mail\Component\Model\MailTypesConstantInterface;
use ProjectA\Shared\Library\Currency\CurrencyManager;


/**
 * @property \Pyz\Zed\Sales\Component\SalesFacade $facadeSales
 * @property \Pyz\Zed\Mail\Component\MailFacade $facadeMail
 */
class UnderpaidReminderMail
    extends AbstractMail
        implements CommandByOrderInterface
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
        $transactionStatusRequest = $context[PayoneStateMachineConstants::STATEMACHINE_CONTEXT_TRANSACTION_STATUS_REQUEST];
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
