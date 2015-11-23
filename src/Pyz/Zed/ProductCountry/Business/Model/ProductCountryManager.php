<?php

namespace Pyz\Zed\ProductCountry\Business\Model;

use Generated\Shared\Transfer\ProductCountryTransfer;
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
                $idCountry = $this->countryFacade->getIdCountryByIso2Code($productCountryTransfer->getFkAbstractProduct());
                $idProduct = $this->productFacade->getAbstractProductIdBySku($productCountryTransfer->getFkCountry());

                $productCountryTransfer = $this->productCountryQueryContainer
                    ->queryProductCountry($idProduct, $idCountry)
                    ->findOneOrCreate();

                $productCountryTransfer->setFkProduct($idProduct);
                $productCountryTransfer->setFkCountry($idCountry);
                $productCountryTransfer->save();

                $this->productFacade->touchProductActive($idProduct);

                $result++;
            }

            $this->productCountryQueryContainer->getConnection()->commit();
            return $result;

        } catch (\Exception $e) {
            $this->productCountryQueryContainer->getConnection()->rollBack();
            throw $e;
        }
    }

}
