<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Propel\Runtime\Connection\ConnectionInterface;
use Pyz\Zed\Country\Business\CountryFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\ProductCountry\Persistence\ProductCountryQueryContainerInterface;

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
     * @var ProductCountryQueryContainerInterface
     */
    protected $productCountryQueryContainer;

    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @param ProductFacade $productFacade
     * @param CountryFacade $countryFacade
     * @param ProductCountryQueryContainerInterface $productCountryQueryContainerInterface
     * @param ConnectionInterface $connection
     */
    public function __construct(
        ProductFacade $productFacade,
        CountryFacade $countryFacade,
        ProductCountryQueryContainerInterface $productCountryQueryContainerInterface,
        ConnectionInterface $connection)
    {
        $this->productFacade = $productFacade;
        $this->countryFacade = $countryFacade;
        $this->productCountryQueryContainer = $productCountryQueryContainerInterface;
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

                $productCountry = $this->productCountryQueryContainer
                    ->queryProductCountry($idProduct, $idCountry)
                    ->findOneOrCreate();

                $productCountry->setFkProduct($idProduct);
                $productCountry->setFkCountry($idCountry);
                $productCountry->save();

                $this->productFacade->touchProductActive($idProduct);
            }
            $this->connection->commit();
        } catch (\Exception $e) {
            $this->connection->rollBack();
            throw $e;
        }
    }

}
