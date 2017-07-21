<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\Discount;

use DateTime;
use Orm\Zed\Discount\Persistence\SpyDiscountQuery;
use Orm\Zed\Discount\Persistence\SpyDiscountVoucherPoolQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentCarrierQuery;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Spryker\Shared\Discount\DiscountConstants;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class DiscountWriterStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;
    const KEY_DISCOUNT_KEY = 'discount_key';
    const KEY_DISPLAY_NAME = 'display_name';
    const KEY_DESCRIPTION = 'description';
    const KEY_AMOUNT = 'amount';
    const KEY_IS_ACTIVE = 'is_active';
    const KEY_IS_EXCLUSIVE = 'is_exclusive';
    const KEY_VALID_FROM = 'valid_from';
    const KEY_VALID_TO = 'valid_to';
    const KEY_CALCULATOR_PLUGIN = 'calculator_plugin';
    const KEY_DISCOUNT_TYPE = 'discount_type';
    const KEY_DECISION_RULE_QUERY_STRING = 'decision_rule_query_string';
    const KEY_COLLECTOR_QUERY_STRING = 'collector_query_string';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $discountEntity = SpyDiscountQuery::create()
            ->filterByDiscountKey($dataSet[static::KEY_DISCOUNT_KEY])
            ->findOneOrCreate();

        $dataSet[static::KEY_DECISION_RULE_QUERY_STRING] = $this->processQueryString($dataSet[static::KEY_DECISION_RULE_QUERY_STRING]);
        $dataSet[static::KEY_COLLECTOR_QUERY_STRING] = $this->processQueryString($dataSet[static::KEY_COLLECTOR_QUERY_STRING]);

        if ($dataSet[static::KEY_DISCOUNT_TYPE] === DiscountConstants::TYPE_VOUCHER) {
            $discountVoucherPoolEntity = SpyDiscountVoucherPoolQuery::create()
                ->filterByName($dataSet[static::KEY_DISPLAY_NAME])
                ->findOneOrCreate();

            $discountVoucherPoolEntity->setIsActive($dataSet[static::KEY_IS_ACTIVE]);

            $discountEntity->setVoucherPool($discountVoucherPoolEntity);
        }

        $discountEntity
            ->setDisplayName($dataSet[static::KEY_DISPLAY_NAME])
            ->setDescription($dataSet[static::KEY_DESCRIPTION])
            ->setAmount((int)$dataSet[static::KEY_AMOUNT])
            ->setIsActive($dataSet[static::KEY_IS_ACTIVE])
            ->setIsExclusive($dataSet[static::KEY_IS_EXCLUSIVE])
            ->setValidFrom(new DateTime($dataSet[static::KEY_VALID_FROM]))
            ->setValidTo(new DateTime($dataSet[static::KEY_VALID_TO]))
            ->setCalculatorPlugin($dataSet[static::KEY_CALCULATOR_PLUGIN])
            ->setDiscountType($dataSet[static::KEY_DISCOUNT_TYPE])
            ->setDecisionRuleQueryString($dataSet[static::KEY_DECISION_RULE_QUERY_STRING])
            ->setCollectorQueryString($dataSet[static::KEY_COLLECTOR_QUERY_STRING])
            ->save();
    }

    /**
     * @param string $queryString
     *
     * @return string
     */
    protected function processQueryString($queryString)
    {
        $queryString = $this->convertShipmentCarrierNameToId($queryString);
        $queryString = $this->convertShipmentMethodNameToId($queryString);

        return $queryString;
    }

    /**
     * @param string $queryString
     *
     * @return string
     */
    protected function convertShipmentMethodNameToId($queryString)
    {
        $shipmentMethodNames = [];
        preg_match_all('/shipment-method = "([\w \(\)]*)"/', $queryString, $shipmentMethodNames);
        $shipmentMethodNames = $shipmentMethodNames[1];

        foreach ($shipmentMethodNames as $shipmentName) {
            $shipmentCarrierNameMatches = [];
            preg_match_all('/([\w ]+)\(([\w ]+)\)/', $shipmentName, $shipmentCarrierNameMatches);

            $shipmentMethodName = empty($shipmentCarrierNameMatches[1][0]) ? $shipmentName : trim($shipmentCarrierNameMatches[1][0]);
            $shipmentCarrierName = empty($shipmentCarrierNameMatches[2][0]) ? '' : trim($shipmentCarrierNameMatches[2][0]);

            $spyShipmentMethod = SpyShipmentMethodQuery::create()
                ->filterByName($shipmentMethodName)
                ->useShipmentCarrierQuery()
                    ->filterByName($shipmentCarrierName)
                    ->endUse()
                ->findOne();

            $queryString = str_replace($shipmentName, $spyShipmentMethod->getIdShipmentMethod(), $queryString);
        }

        return $queryString;
    }

    /**
     * @param string $queryString
     *
     * @return string
     */
    protected function convertShipmentCarrierNameToId($queryString)
    {
        $shipmentCarrierNames = [];
        preg_match_all('/shipment-carrier = "([\w \(\)]*)"/', $queryString, $shipmentCarrierNames);
        $shipmentCarrierNames = $shipmentCarrierNames[1];

        foreach ($shipmentCarrierNames as $shipmentCarrierName) {

            $spyShipmentCarrier = SpyShipmentCarrierQuery::create()
                ->filterByName($shipmentCarrierName)
                ->findOne();

            $queryString = str_replace('"' . $shipmentCarrierName . '"', '"' . $spyShipmentCarrier->getIdShipmentCarrier() . '"', $queryString);
        }

        return $queryString;
    }

}
