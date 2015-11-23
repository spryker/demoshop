<?php

namespace Pyz\Zed\ProductCountry\Communication\Form;

use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\ProductCountry\Persistence\Map\SpyProductCountryTableMap;
use Pyz\Zed\Country\Business\CountryFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\ProductCountry\Persistence\ProductCountryQueryContainer;
use SprykerEngine\Zed\Gui\Communication\Form\AbstractForm;
use Symfony\Component\Form\FormTypeInterface;

class ProductCountryForm extends AbstractForm
{

    const SKU = 'sku';

    /**
     * @var CountryFacade
     */
    protected $countryFacade;

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var ProductCountryQueryContainer
     */
    protected $productCountryQueryContainer;

    /**
     * @param FormTypeInterface $formTypeInterface
     * @param ProductFacade $productFacade
     * @param ProductCountryQueryContainer $productCountryQueryContainer
     */
    public function __construct(FormTypeInterface $formTypeInterface, ProductFacade $productFacade, ProductCountryQueryContainer $productCountryQueryContainer)
    {
        parent::__construct($formTypeInterface);

        $this->productFacade = $productFacade;
        $this->productCountryQueryContainer = $productCountryQueryContainer;
    }

    /**
     * @return array
     */
    protected function populateFormFields()
    {
        $sku = $this->getRequest()->query->get(self::SKU);
        $idProduct = $this->productFacade->getAbstractProductIdBySku($sku);

        $out = [
            ProductCountryFormType::FIELD_FK_ABSTRACT_PRODUCT => $idProduct,
            ProductCountryFormType::FIELD_FK_COUNTRY => $this->getCountryByIdProduct($idProduct),
        ];

        return $out;
    }

    /**
     * @param int $idProduct
     *
     * @return string|null
     */
    protected function getCountryByIdProduct($idProduct)
    {
        $country = $this->productCountryQueryContainer
            ->queryCountryByProduct($idProduct)
            ->findOne()
        ;

        if ($country === null) {
            return null;
        }

        return $country->getFkCountry();
    }

}
