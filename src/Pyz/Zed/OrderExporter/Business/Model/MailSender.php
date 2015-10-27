<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;

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
     */
    public function sendAfterbuyResultMail(PdAfterbuyResponse $afterbuyResponseEntity)
    {
        $success = ($afterbuyResponseEntity->getSuccess() ? 'success' : 'fail');

        $to      = $this->getFormattedEmailAddresses();
        $subject = 'Afterbuy Export Order ID ' . $afterbuyResponseEntity->getFkOrder() . ' - ' . $success;
        mail($to, $subject, $this->createMailMessage($afterbuyResponseEntity));
    }

    /**
     * @param PdAfterbuyResponse $afterbuyResponse
     * @return string
     */
    protected function createMailMessage(PdAfterbuyResponse $afterbuyResponse)
    {
        $message  = '<html>Order with Id : <b>' . $afterbuyResponse->getFkOrder() . '</b>';

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
