<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Orm\Zed\ProductCountry\Persistence\SpyProductCountry;
use Propel\Runtime\Connection\ConnectionInterface;
use Pyz\Zed\Country\Business\CountryFacade;
use Pyz\Zed\Product\Business\ProductFacade;

class ProductCountryManager implements ProductCountryManagerInterface
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var CountryFacade
     */
    protected $countryFacade;

    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @param ProductFacade $productFacade
     * @param CountryFacade $countryFacade
     * @param ConnectionInterface $connection
     */
    public function __construct(ProductFacade $productFacade, CountryFacade $countryFacade, ConnectionInterface $connection)
    {
        $this->productFacade = $productFacade;
        $this->countryFacade = $countryFacade;
        $this->connection = $connection;
    }

    /**
     * @param array $productCountryData Product SKU => Country ISO 2 Code
     *
     * @throws \Exception
     *
     * @return void
     */
    public function importProductCountryData(array $productCountryData)
    {
        $this->connection->beginTransaction();
        try {
            foreach ($productCountryData as $productSku => $countryCodeCollection) {
                foreach ($countryCodeCollection as $countryCode) {
                    $idCountry = $this->countryFacade->getIdCountryByIso2Code($countryCode);
                    $idProduct = $this->productFacade->getAbstractProductIdBySku($productSku);

                    $productCountry = new SpyProductCountry($idCountry);
                    $productCountry->setFkProduct($idProduct);
                    $productCountry->setFkCountry($idCountry);

                    $productCountry->save();

                    $this->productFacade->touchProductActive($idProduct);
                }
            }
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

}
