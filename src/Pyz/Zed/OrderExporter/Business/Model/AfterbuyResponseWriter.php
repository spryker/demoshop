<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;
use Generated\Shared\Transfer\SalesOrderItemTransfer;

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
     * @param AfterbuyExportTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createAfterbuyResponse(AfterbuyExportTransfer $afterbuyTransfer, $afterbuyResponse)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setFullResponse(json_encode($afterbuyResponse))
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
            if (array_key_exists('success', $afterbuyResponse) && $afterbuyResponse['success']) {
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
     * In not production environment (dev, staging) afterbuy response is saved as isTest TRUE and isSuccessful TRUE
     *
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @param $postVariables
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAfterbuyResponseMocked(AfterbuyExportTransfer $afterbuyExportTransfer, $postVariables)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setRequest($postVariables)
            ->setSuccess(true)
            ->setIsTest(true);

        $afterbuyResponseEntity->save();

        $afterbuyExportTransfer
            ->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse())
            ->setSuccess(true);

        $this->saveOrderItemExport($afterbuyExportTransfer);
    }

    /**
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function saveOrderItemExport(AfterbuyExportTransfer $afterbuyExportTransfer)
    {
        $orderItemAfterbuyResponseEntities = array();

        /** @var SalesOrderItemTransfer $orderItem */
        foreach ($afterbuyExportTransfer->getOrderItems() as $orderItem) {
            $orderItemAfterbuyResponseEntity = new PdSalesOrderItemAfterbuyExport();
            $orderItemAfterbuyResponseEntity
                ->setFkOrder($afterbuyExportTransfer->getOrderId())
                ->setFkOrderItem($orderItem->getOrderItemId())
                ->setFkAfterbuyResponse($afterbuyExportTransfer->getAfterbuyResponseId())
                ->setSuccess($afterbuyExportTransfer->getSuccess());
            $orderItemAfterbuyResponseEntity->save();

            $orderItemAfterbuyResponseEntities[] = $orderItemAfterbuyResponseEntity;
        }

        return $orderItemAfterbuyResponseEntities;
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
