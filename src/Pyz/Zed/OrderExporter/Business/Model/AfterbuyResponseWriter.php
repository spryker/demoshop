<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyResponseTransfer;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;

class AfterbuyResponseWriter implements AfterbuyResponseWriterInterface
{
    /**
     * @var MailSenderInterface
     */
    protected $mailSender;

    /**
     * @param MailSenderInterface $mailSender
     */
    public function __construct(MailSenderInterface $mailSender)
    {
        $this->mailSender = $mailSender;
    }

    /**
     * @param AfterbuyResponseTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     * @param $orderId
     * @return PdAfterbuyResponse
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createAfterbuyResponse(AfterbuyResponseTransfer $afterbuyTransfer, $afterbuyResponse, $orderId)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setFullResponse(json_encode($afterbuyResponse))
            ->setFkOrder($orderId)
            ->setRequest($afterbuyTransfer->getRequest())
            ->setHttpStatusCode($afterbuyTransfer->getHttpStatusCode());

        if (array_key_exists('success', $afterbuyResponse)) {
            $afterbuyResponseEntity->setSuccess($afterbuyResponse['success']);
        }

        if (array_key_exists('errorlist', $afterbuyResponse)) {
            $afterbuyResponseEntity->setErrorsList(json_encode($afterbuyResponse['errorlist']));
        }
        $afterbuyResponseEntity->save();

        $this->mailSender->sendAfterbuyResultMail($afterbuyResponseEntity);

        return $afterbuyResponseEntity;
    }
}
