<?php

namespace Pyz\Yves\Customer\Form;

use Generated\Shared\Transfer\AddressTransfer;
use Spryker\Shared\Gui\Form\AbstractForm;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Transfer\TransferInterface;
use Symfony\Component\Form\FormBuilderInterface;

class AddressForm extends AbstractForm
{

    const COUNTRY_GLOSSARY_PREFIX = 'countries.iso.';

    /**
     * @var AddressTransfer
     */
    protected $addressTransfer;

    /**
     * @var array
     */
    protected $store;

    /**
     * @param Store $store
     * @param AddressTransfer $addressTransfer
     */
    public function __construct(Store $store, AddressTransfer $addressTransfer = null)
    {
        $this->store = $store;
        $this->addressTransfer = $addressTransfer;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'profileForm';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(AddressTransfer::FIRST_NAME, 'text', [
                'label'    => 'customer.address.first_name',
                'required' => true,
            ])
            ->add(AddressTransfer::LAST_NAME, 'text', [
                'label'    => 'customer.address.last_name',
                'required' => true,
            ])
            ->add(AddressTransfer::COMPANY, 'text', [
                'label'    => 'customer.address.company',
                'required' => false,
            ])
            ->add(AddressTransfer::ADDRESS1, 'text', [
                'label'    => 'customer.address.address1',
                'required' => true,
            ])
            ->add(AddressTransfer::ADDRESS2, 'text', [
                'label'    => 'customer.address.address2',
                'required' => true,
            ])
            ->add(AddressTransfer::ADDRESS3, 'text', [
                'label'    => 'customer.address.address3',
                'required' => false,
            ])
            ->add(AddressTransfer::ZIP_CODE, 'text', [
                'label'    => 'customer.address.zip_code',
                'required' => true,
            ])
            ->add(AddressTransfer::CITY, 'text', [
                'label'    => 'customer.address.city',
                'required' => true,
            ])
            ->add('iso2Code', 'choice', [
                'label'    => 'customer.address.country',
                'required' => true,
                'choices' => $this->getAvailableCountries(),
            ])
            ->add(AddressTransfer::PHONE, 'text', [
                'label'    => 'customer.address.phone',
                'required' => false,
            ])
            ->add(AddressTransfer::IS_DEFAULT_SHIPPING, 'checkbox', [
                'label'    => 'customer.address.is_default_shipping',
                'required' => false,
            ])
            ->add(AddressTransfer::IS_DEFAULT_BILLING, 'checkbox', [
                'label'    => 'customer.address.is_default_billing',
                'required' => false,
            ])
            ->add(AddressTransfer::ID_CUSTOMER_ADDRESS, 'hidden')
            ->add(AddressTransfer::FK_CUSTOMER, 'hidden');
    }

    /**
     * @return TransferInterface|array
     */
    public function populateFormFields()
    {
        $addressTransfer = $this->getDataClass();

        if ($this->addressTransfer !== null) {
            $addressTransfer->fromArray($this->addressTransfer->toArray());
        }

        return $addressTransfer;
    }

    /**
     * @return TransferInterface|null
     */
    protected function getDataClass()
    {
        return new AddressTransfer();
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
