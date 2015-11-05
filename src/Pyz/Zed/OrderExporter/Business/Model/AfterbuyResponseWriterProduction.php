<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Orm\Zed\OrderExporter\Persistence\PdAfterbuyResponse;

class AfterbuyResponseWriterProduction extends AbstractAfterbuyResponseWriter
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
     * @param AfterbuyExportTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAfterbuyResponse(AfterbuyExportTransfer $afterbuyTransfer, $afterbuyResponse)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setFullResponse($afterbuyResponse)
            ->setRequest($afterbuyTransfer->getRequest())
            ->setHttpStatusCode($afterbuyTransfer->getHttpStatusCode())
            ->setSuccess($this->getAfterbuyExportStatus($afterbuyResponse))
            ->setIsTest(false)
            ->setErrorsList($this->getAfterbuyExportErrors($afterbuyResponse));

        $afterbuyResponseEntity->save();

        $afterbuyTransfer
            ->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse())
            ->setSuccess($afterbuyResponseEntity->getSuccess());

        $orderItemAfterbuyResponseEntities = $this->saveOrderItemExport($afterbuyTransfer);

        $this->mailSender->sendAfterbuyResultMail($afterbuyResponseEntity, $orderItemAfterbuyResponseEntities);
    }


    /**
     * @param $afterbuyResponse
     * @return bool
     */
    protected function getAfterbuyExportStatus($afterbuyResponse)
    {
        $success = false;
        if ($this->isValidXmlResponse($afterbuyResponse)) {
            $afterbuyResponse = $this->parseXml($afterbuyResponse);
            if (array_key_exists('success', $afterbuyResponse) && $afterbuyResponse['success'] === '1') {
                $success = true;
            }
        }
        return $success;
    }

    /**
     * @param $afterbuyResponse
     * @return null|string
     */
    protected function getAfterbuyExportErrors($afterbuyResponse)
    {
        $errorList = null;
        if ($this->isValidXmlResponse($afterbuyResponse)) {
            $afterbuyResponse = $this->parseXml($afterbuyResponse);
            if (array_key_exists('errorlist', $afterbuyResponse)) {
                $errorList = json_encode($afterbuyResponse['errorlist']);
            }
        }
        return $errorList;
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
