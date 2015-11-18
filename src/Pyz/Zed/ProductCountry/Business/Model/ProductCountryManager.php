<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Orm\Zed\ProductCountry\Persistence\SpyProductCountry;
use Propel\Runtime\Connection\ConnectionInterface;
use Pyz\Zed\ProductCountry\Dependency\ProductCountryToCountryInterface;
use Pyz\Zed\ProductCountry\Dependency\ProductCountryToProductInterface;

class ProductCountryManager implements ProductCountryManagerInterface
{

    /**
     * @var ProductCountryToProductInterface
     */
    protected $productFacade;

    /**
     * @var ProductCountryToCountryInterface
     */
    protected $countryFacade;

    /**
     * @var ConnectionInterface
     */
    protected $connection;

    public function __construct(ProductCountryToProductInterface $productFacade, ProductCountryToCountryInterface $countryFacade, ConnectionInterface $connection)
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
            foreach ($productCountryData as $productSku => $countryCode) {
                $idCountry = $this->countryFacade->getIdCountryByIso2Code($countryCode);
                $idProduct = $this->productFacade->getAbstractProductIdBySku($productSku);

                $productCountry = new SpyProductCountry($idCountry);
                $productCountry->setFkProduct($idProduct);
                $productCountry->setFkCountry($idCountry);

                $productCountry->save();
            }
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

}
