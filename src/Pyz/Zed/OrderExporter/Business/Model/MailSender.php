<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;

class MailSender implements MailSenderInterface
{
    /**
     * @var OrderExporterConfig
     */
    protected $orderExporterConfig;

    function __construct(OrderExporterConfig $orderExporterConfig)
    {
        $this->orderExporterConfig = $orderExporterConfig;
    }

    /**
     * @param PdAfterbuyResponse $afterbuyResponseEntity
     * @param PdSalesOrderItemAfterbuyExport [] $orderItemAfterbuyResponseEntity
     */
    public function sendAfterbuyResultMail(PdAfterbuyResponse $afterbuyResponseEntity, array $orderItemAfterbuyResponseEntity)
    {
        $success = ($afterbuyResponseEntity->getSuccess() ? 'success' : 'fail');
        $ids = $this->getOrderItemIdFromTransfer($orderItemAfterbuyResponseEntity);
        $to      = $this->getFormattedEmailAddresses();
        $subject = 'Afterbuy Export Order Item ID ' . $this->getOrderItemIdFromTransfer($orderItemAfterbuyResponseEntity) . ' - ' . $success;
        mail($to, $subject, $this->createMailMessage($afterbuyResponseEntity, $ids));
    }

    /**
     * @param PdSalesOrderItemAfterbuyExport [] $orderItemAfterbuyResponseEntities
     * @return string
     */
    protected function getOrderItemIdFromTransfer(array $orderItemAfterbuyResponseEntities)
    {
        $ids = '';
        foreach ($orderItemAfterbuyResponseEntities as $orderItemAfterbuyResponseEntity) {
            $ids .= $orderItemAfterbuyResponseEntity->getFkOrderItem() . ' ';
        }

        return $ids;
    }

    /**
     * @param PdAfterbuyResponse $afterbuyResponse
     * @param $ids
     * @return string
     */
    protected function createMailMessage(PdAfterbuyResponse $afterbuyResponse, $ids)
    {
        $message  = '<html>Order Items with Id : <b>' . $ids . '</b>';

        if ( $afterbuyResponse->getSuccess()) {
            $message .= '<p>Export status : <b>Success</b></p>';
        } else {
            $message .= '<p>Export status : <b>Fail</b></p>';
            $message .= '<p>Errors : ' . $afterbuyResponse->getErrorsList() . '</p>';
        }
        $message .= '<p>Request sent : ' . $afterbuyResponse->getRequest() . '</p></html>';

        return $message;
    }

    /**
     * @return string
     */
    protected function getFormattedEmailAddresses()
    {
        $emailsForFeedback = $this->orderExporterConfig->getAfterbuyEmailsForAfterbuyFeedback();

        return implode(',', $emailsForFeedback);
    }
}
