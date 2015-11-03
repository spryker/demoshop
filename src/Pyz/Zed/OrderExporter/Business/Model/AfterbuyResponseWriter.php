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
        $success = false;

        if ($this->isValidXmlResponse($afterbuyResponse)) {
            $afterbuyResponse = $this->parseXml($afterbuyResponse);
            if (array_key_exists('success', $afterbuyResponse)) {
                $afterbuyResponseEntity->setSuccess($afterbuyResponse['success']);
                $success = true;
            }

            if (array_key_exists('errorlist', $afterbuyResponse)) {
                $afterbuyResponseEntity->setErrorsList(json_encode($afterbuyResponse['errorlist']));
            }
        }
        $afterbuyResponseEntity
            ->setFullResponse(json_encode($afterbuyResponse))
            ->setRequest($afterbuyTransfer->getRequest())
            ->setHttpStatusCode($afterbuyTransfer->getHttpStatusCode());

        $afterbuyResponseEntity->save();

        $afterbuyTransfer->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse());

        $orderItemAfterbuyResponseEntities = $this->saveOrderItemExport($afterbuyTransfer, $success);

        $this->mailSender->sendAfterbuyResultMail($afterbuyResponseEntity, $orderItemAfterbuyResponseEntities);
    }

    /**
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
        $afterbuyExportTransfer->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse());
        $this->saveOrderItemExport($afterbuyExportTransfer);
    }

    /**
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @param bool $success
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function saveOrderItemExport(AfterbuyExportTransfer $afterbuyExportTransfer, $success = true)
    {
        $orderItemAfterbuyResponseEntities = array();

        /** @var SalesOrderItemTransfer $orderItem */
        foreach ($afterbuyExportTransfer->getOrderItems() as $orderItem) {
            $orderItemAfterbuyResponseEntity = new PdSalesOrderItemAfterbuyExport();
            $orderItemAfterbuyResponseEntity
                ->setFkOrder($afterbuyExportTransfer->getOrderId())
                ->setFkOrderItem($orderItem->getOrderItemId())
                ->setFkAfterbuyResponse($afterbuyExportTransfer->getAfterbuyResponseId())
                ->setSuccess($success);
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
