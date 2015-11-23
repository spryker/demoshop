<?php

namespace Pyz\Zed\ProductCountry\Communication\Form;

use Pyz\Zed\Country\Business\CountryFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\ProductCountry\Persistence\ProductCountryQueryContainer;
use SprykerEngine\Zed\Gui\Communication\Form\AbstractFormType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductCountryFormType extends AbstractFormType
{

    const PREFERRED_COUNTRY = 'China';

    const FIELD_FK_ABSTRACT_PRODUCT = 'fk_abstract_product';
    const FIELD_FK_COUNTRY = 'fk_country';

    /**
     * @var CountryFacade
     */
    protected $countryFacade;

    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @param CountryFacade $countryFacade
     * @param ProductFacade $productFacade
     */
    public function __construct(CountryFacade $countryFacade, ProductFacade $productFacade)
    {
        $this->countryFacade = $countryFacade;
        $this->productFacade = $productFacade;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_FK_ABSTRACT_PRODUCT, 'choice', [
                'label' => 'Product',
                'placeholder' => 'Select Product',
                'choices' => $this->getAbstractProducts(),
            ])
            ->add(self::FIELD_FK_COUNTRY, 'choice', [
                'label' => 'Country',
                'placeholder' => 'Select Country',
                'choices' => $this->getCountryChoices(),
                'preferred_choices' => [
                    $this->getPreferredCountry(),
                ],
            ])
        ;
    }

    /**
     * @return array
     */
    public function getCountryChoices()
    {
        $countries = $this->countryFacade->getAvailableCountries();

        $countryChoices = [];

        foreach ($countries->getCountries() as $country) {
            $countryChoices[$country->getIdCountry()] = $country->getName();
        }

        return $countryChoices;
    }

    /**
     * @return string
     */
    public function getPreferredCountry()
    {
        $preferredCountryTransfer = $this->countryFacade
            ->getPreferedCountryByName(self::PREFERRED_COUNTRY)
        ;
        $preferredCountry = $preferredCountryTransfer->getIdCountry();

        return $preferredCountry;
    }

    /**
     * @return array
     */
    public function getAbstractProducts()
    {
        $products = $this->productFacade->getAbstractProducts();

        $choices = [];
        foreach ($products->getProduct() as $product) {
            $choices[$product->getIdAbstractProduct()] = $product->getSku();
        }

        return $choices;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'product_country';
    }

}
