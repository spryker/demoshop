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

        if ($this->isValidXmlResponse($afterbuyResponse)) {
            $afterbuyResponse = $this->parseXml($afterbuyResponse);
            if (array_key_exists('success', $afterbuyResponse)) {
                $afterbuyResponseEntity->setSuccess($afterbuyResponse['success']);
            }

            if (array_key_exists('errorlist', $afterbuyResponse)) {
                $afterbuyResponseEntity->setErrorsList(json_encode($afterbuyResponse['errorlist']));
            }
        }
        $afterbuyResponseEntity
            ->setFullResponse(json_encode($afterbuyResponse))
            ->setFkOrder($orderId)
            ->setRequest($afterbuyTransfer->getRequest())
            ->setHttpStatusCode($afterbuyTransfer->getHttpStatusCode());

        $afterbuyResponseEntity->save();

        $this->mailSender->sendAfterbuyResultMail($afterbuyResponseEntity);

        return $afterbuyResponseEntity;
    }

    /**
     * @param $afterbuyResponse
     * @return array
     */
    protected function parseXml($afterbuyResponse)
    {
        return (array) simplexml_load_string($afterbuyResponse);
    }

    /**
     * @param $afterbuyResponse
     * @return bool
     */
    protected function isValidXmlResponse($afterbuyResponse)
    {
        try {
            simplexml_load_string($afterbuyResponse);
        } catch (\Exception $e) {

            return false;
        }
        return true;
    }

}
