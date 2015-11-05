<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Orm\Zed\OrderExporter\Persistence\PdAfterbuyResponse;
use Orm\Zed\OrderExporter\Persistence\PdSalesOrderItemAfterbuyExport;

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
        $subject = 'Afterbuy Export ' . $success . ' order Item ID ' . implode('-', $ids);
        mail($to, $subject, $this->createMailMessage($afterbuyResponseEntity, $ids));
    }

    /**
     * @param PdSalesOrderItemAfterbuyExport [] $orderItemAfterbuyResponseEntities
     * @return array
     */
    protected function getOrderItemIdFromTransfer(array $orderItemAfterbuyResponseEntities)
    {
        $ids = array();
        foreach ($orderItemAfterbuyResponseEntities as $orderItemAfterbuyResponseEntity) {
            $ids[] = $orderItemAfterbuyResponseEntity->getFkOrderItem();
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
        $message = '<html>';
        $message .= '<body>';

        if ( $afterbuyResponse->getSuccess()) {
            $message .= '<p>Export status : <b>Success</b></p>';
        } else {
            $message .= '<p>Export status : <b>Fail</b></p>';
            $message .= '<p>Errors : ' . $afterbuyResponse->getErrorsList() . '</p>';
        }
        $message  .= $this->addItemsListToMessage($ids);
        $message .= '<p>Request sent : ' . $afterbuyResponse->getRequest() . '</p>';
        $message .= '</body>';
        $message .= '</html>';

        return $message;
    }

    /**
     * @param array $ids
     * @return string
     */
    protected function addItemsListToMessage(array $ids)
    {
        $message = '<ul>';
        foreach ($ids as $id) {
            $message .= '<li>' . $id . '</li>';
        }
        $message .= '</ul>';

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
