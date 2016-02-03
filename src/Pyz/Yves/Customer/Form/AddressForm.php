<?php

namespace Pyz\Yves\Customer\Form;

use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class AddressForm extends AbstractForm
{

    const COUNTRY_GLOSSARY_PREFIX = 'countries.iso.';

    const FIELD_FIRST_NAME = 'first_name';
    const FIELD_LAST_NAME = 'last_name';
    const FIELD_COMPANY = 'company';
    const FIELD_ADDRESS_1 = 'address1';
    const FIELD_ADDRESS_2 = 'address2';
    const FIELD_ADDRESS_3 = 'address3';
    const FIELD_ZIP_CODE = 'zip_code';
    const FIELD_CITY = 'city';
    const FIELD_ISO_2_CODE = 'iso2_code';
    const FIELD_PHONE = 'phone';
    const FIELD_IS_DEFAULT_SHIPPING = 'is_default_shipping';
    const FIELD_IS_DEFAULT_BILLING = 'is_default_billing';
    const FIELD_ID_CUSTOMER_ADDRESS = 'id_customer_address';
    const FIELD_FK_CUSTOMER = 'fk_customer';

    /**
     * @var array
     */
    protected $store;

    /**
     * @param \Spryker\Shared\Kernel\Store $store
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_FIRST_NAME, 'text', [
                'label'    => 'customer.address.first_name',
                'required' => true,
            ])
            ->add(self::FIELD_LAST_NAME, 'text', [
                'label'    => 'customer.address.last_name',
                'required' => true,
            ])
            ->add(self::FIELD_COMPANY, 'text', [
                'label'    => 'customer.address.company',
                'required' => false,
            ])
            ->add(self::FIELD_ADDRESS_1, 'text', [
                'label'    => 'customer.address.address1',
                'required' => true,
            ])
            ->add(self::FIELD_ADDRESS_2, 'text', [
                'label'    => 'customer.address.address2',
                'required' => true,
            ])
            ->add(self::FIELD_ADDRESS_3, 'text', [
                'label'    => 'customer.address.address3',
                'required' => false,
            ])
            ->add(self::FIELD_ZIP_CODE, 'text', [
                'label'    => 'customer.address.zip_code',
                'required' => true,
            ])
            ->add(self::FIELD_CITY, 'text', [
                'label'    => 'customer.address.city',
                'required' => true,
            ])
            ->add(self::FIELD_ISO_2_CODE, 'choice', [
                'label'    => 'customer.address.country',
                'required' => true,
                'choices' => $this->getAvailableCountries(),
            ])
            ->add(self::FIELD_PHONE, 'text', [
                'label'    => 'customer.address.phone',
                'required' => false,
            ])
            ->add(self::FIELD_IS_DEFAULT_SHIPPING, 'checkbox', [
                'label'    => 'customer.address.is_default_shipping',
                'required' => false,
            ])
            ->add(self::FIELD_IS_DEFAULT_BILLING, 'checkbox', [
                'label'    => 'customer.address.is_default_billing',
                'required' => false,
            ])
            ->add(self::FIELD_ID_CUSTOMER_ADDRESS, 'hidden')
            ->add(self::FIELD_FK_CUSTOMER, 'hidden');
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|array
     */
    public function populateFormFields()
    {
        return null;
    }

    /**
     * @return \Spryker\Shared\Transfer\TransferInterface|null
     */
    protected function getDataClass()
    {
        return null;
    }

    /**
     * @return array
     */
    protected function getAvailableCountries()
    {
        $countries = [];

        foreach ($this->store->getCountries() as $iso2Code) {
            $countries[$iso2Code] = self::COUNTRY_GLOSSARY_PREFIX . $iso2Code;
        }

        return $countries;
    }

}
