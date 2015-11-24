<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Generated\Shared\Transfer\ProductCountryTransfer;
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
     * @param ProductFacade $productFacade
     * @param CountryFacade $countryFacade
     * @param ProductCountryQueryContainerInterface $productCountryQueryContainerInterface
     */
    public function __construct(
        ProductFacade $productFacade,
        CountryFacade $countryFacade,
        ProductCountryQueryContainerInterface $productCountryQueryContainerInterface)
    {
        $this->productFacade = $productFacade;
        $this->countryFacade = $countryFacade;
        $this->productCountryQueryContainer = $productCountryQueryContainerInterface;
    }

    /**
     * @param ProductCountryTransfer[] $productCountryCollection
     *
     * @throws \Exception
     *
     * @return int Number of imported product countries
     */
    public function importProductCountryData(array $productCountryCollection)
    {
        $result = 0;
        $this->productCountryQueryContainer->getConnection()->beginTransaction();

        try {
            foreach ($productCountryCollection as $productCountryTransfer) {
                $idCountry = $this->countryFacade->getIdCountryByIso2Code($productCountryTransfer->getCountryCode());
                $idAbstractProduct = $this->productFacade->getAbstractProductIdBySku($productCountryTransfer->getAbstractProductSku());

                $productCountryEntity = $this->productCountryQueryContainer
                    ->queryProductCountry($idAbstractProduct, $idCountry)
                    ->findOneOrCreate();

                $productCountryEntity->setFkAbstractProduct($idAbstractProduct);
                $productCountryEntity->setFkCountry($idCountry);
                $productCountryEntity->save();

                $this->productFacade->touchProductActive($idAbstractProduct);

                $result++;
            }

            $this->productCountryQueryContainer->getConnection()->commit();
            return $result;

        } catch (\Exception $e) {
            $this->productCountryQueryContainer->getConnection()->rollBack();
            throw $e;
        }
    }

    /**
     * @param ProductCountryTransfer $productCountryTransfer
     *
     * @return void
     */
    public function saveProductCountry(ProductCountryTransfer $productCountryTransfer)
    {
        $idCountry = $productCountryTransfer->getFkCountry();
        $idProduct = $productCountryTransfer->getFkAbstractProduct();

        // @todo get connection from product_country table by id product
        // @todo if does not exists, create it

        // @todo assign country and save it to database
    }

}
