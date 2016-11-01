<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Tax;

use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTaxQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Country\Business\CountryFacadeInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Propel\Business\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;
use Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface;

class TaxImporter extends AbstractImporter
{

    const COL_COUNTRY = 'tax_rate_country';
    const COL_RATE = 'tax_rate_percent';
    const COL_RATE_NAME = 'tax_rate_name';
    const COL_SET_NAME = 'tax_set_name';

    /**
     * @var \Spryker\Zed\Country\Business\CountryFacadeInterface
     */
    protected $countryFacade;

    /**
     * @var \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface
     */
    protected $taxQueryContainer;

    /**
     * @var \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface
     */
    protected $shipmentQueryContainer;

    /**
     * @var array
     */
    protected $shipmentSets = [
        'Shipment Taxes' => true,
        'Tax Exempt' => true
    ];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Country\Business\CountryFacadeInterface $countryFacade
     * @param \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface $taxQueryContainer
     * @param \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface $shipmentQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        CountryFacadeInterface $countryFacade,
        TaxQueryContainerInterface $taxQueryContainer,
        ShipmentQueryContainerInterface $shipmentQueryContainer
    ) {
        parent::__construct($localeFacade);

        $this->countryFacade = $countryFacade;
        $this->taxQueryContainer = $taxQueryContainer;
        $this->localeFacade = $localeFacade;
        $this->shipmentQueryContainer = $shipmentQueryContainer;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (count($data) === 0) {
            return;
        }

        $idCountry = $this->getCountryIdByName($data[self::COL_COUNTRY]);

        $rate = $this->getTaxRate($data);
        $rateName = $data[self::COL_RATE_NAME];
        $setName = $data[self::COL_SET_NAME];

        $taxRateEntity = $this->createTaxRateEntity($idCountry, $rate, $rateName);

        if (!$setName) {
            return;
        }

        $taxSetEntity = $this->createSpyTaxSetEntity($setName);

        $this->createTaxRateSetEntity($taxRateEntity, $taxSetEntity);
        $this->addShipmentTax($taxSetEntity);
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @return void
     */
    protected function addShipmentTax(SpyTaxSet $taxSetEntity)
    {
        if (!isset($this->shipmentSets[$taxSetEntity->getName()])) {
            return;
        }

        $shipmentMethodEntity = $this->shipmentQueryContainer
            ->queryActiveMethods()
            ->filterByFkTaxSet(null, Criteria::ISNULL)
            ->findOne();

        if (!$shipmentMethodEntity) {
            return;
        }

        $shipmentMethodEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
        $shipmentMethodEntity->save();

        unset($this->shipmentSets[$taxSetEntity->getName()]);
    }

    /**
     * @param string $countryName
     *
     * @return int
     */
    protected function getCountryIdByName($countryName)
    {
        $countryTransfer = $this->countryFacade->getPreferredCountryByName($countryName);

        return $countryTransfer->getIdCountry();
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return $this->taxQueryContainer
            ->queryAllTaxRates()
            ->count() > 0;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Tax';
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxRate $taxRateEntity
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSetTax
     */
    protected function createTaxRateSetEntity(SpyTaxRate $taxRateEntity, SpyTaxSet $taxSetEntity)
    {
        $taxRateSetEntity = SpyTaxSetTaxQuery::create()
            ->filterByFkTaxRate($taxRateEntity->getIdTaxRate())
            ->filterByFkTaxSet($taxSetEntity->getIdTaxSet())
            ->findOneOrCreate();

        $taxRateSetEntity->save();

        return $taxRateSetEntity;
    }

    /**
     * @param int $idCountry
     * @param string $rate
     * @param string $rateName
     *
     * @return \Orm\Zed\Tax\Persistence\SpyTaxRate
     */
    protected function createTaxRateEntity($idCountry, $rate, $rateName)
    {
        $taxRateEntity = $this->taxQueryContainer->queryAllTaxRates()
            ->filterByFkCountry($idCountry)
            ->filterByRate($rate)
            ->filterByName($rateName)
            ->findOneOrCreate();

        $taxRateEntity->save();

        return $taxRateEntity;
    }

    /**
     * @param string $setName
     *
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSet
     */
    protected function createSpyTaxSetEntity($setName)
    {
        $taxSetEntity = $this->taxQueryContainer
            ->queryAllTaxSets()
            ->filterByName($setName)
            ->findOneOrCreate();

        $taxSetEntity->save();

        return $taxSetEntity;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    protected function getTaxRate(array $data)
    {
        return $data[self::COL_RATE];
    }

}
