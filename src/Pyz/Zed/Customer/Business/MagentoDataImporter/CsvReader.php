<?php

namespace Pyz\Zed\Customer\Business\MagentoDataImporter;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Orm\Zed\Customer\Persistence\SpyCustomerAddress;
use Pyz\Zed\Customer\Dependency\Facade\CustomerToCountryInterface;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainer;
use SprykerFeature\Zed\Customer\Business\ReferenceGenerator\CustomerReferenceGeneratorInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class CsvReader implements CsvReaderInterface
{
    /**
     * @var string
     */
    protected $filePath;
    /**
     * @var CustomerReferenceGeneratorInterface
     */
    protected $customerReferenceGenerator;
    /**
     * @var CustomerQueryContainer
     */
    protected $customerQueryContainer;

    /**
     * @var CustomerToCountryInterface
     */
    protected $countryFacade;

    /**
     * @param CustomerReferenceGeneratorInterface $customerReferenceGenerator
     * @param CustomerQueryContainer $customerQueryContainer
     * @param CustomerToCountryInterface $customerToCountryInterface
     */
    public function __construct(
        CustomerReferenceGeneratorInterface $customerReferenceGenerator,
        CustomerQueryContainer $customerQueryContainer,
        CustomerToCountryInterface $customerToCountryInterface
    ) {
        $this->customerReferenceGenerator = $customerReferenceGenerator;
        $this->customerQueryContainer = $customerQueryContainer;
        $this->countryFacade = $customerToCountryInterface;
        $this->filePath = __DIR__ . '/customer_details.csv';
    }

    /**
     * @return int
     */
    public function importData()
    {
        if (!file_exists($this->filePath)) {
            throw new Exception('File not found in ' . $this->filePath);
        }

        $customerImported = 0;
        $handle = fopen($this->filePath, 'r');
        $fieldNames = fgetcsv($handle, null, ';');

        while ($row = fgetcsv($handle, null, ';')) {
            $keyValues = array_combine($fieldNames, $row);

            foreach ($keyValues as $key => $value) {
                if ($value === 'NULL') {
                    $keyValues[$key] = null;
                }

                if ($key === 'salutation') {
                    $salutation = $value;
                    $keyValues[$key] = str_replace(['frau', 'herr', 'dr.', '---'], ['Mrs', 'Mr', 'Dr', 'Mrs'], strtolower($salutation));

                    switch ($keyValues[$key]) {
                        case 'Mr':
                            $keyValues['gender'] = 'Male';
                            break;
                        case 'Mrs':
                            $keyValues['gender'] = 'Female';
                            break;

                    }
                }


            }
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($keyValues, true);

            if (!$this->findCustomerByEmail($customerTransfer->getEmail())) {
                $customerEntity = $this->saveCustomer($customerTransfer);
                $this->hydrateAddressTransfer($customerEntity, $keyValues);
                $customerImported++;
            }
        }
        fclose($handle);

        return $customerImported;
    }

    /***
     * @param CustomerTransfer $customerTransfer
     * @return SpyCustomer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function saveCustomer(CustomerTransfer $customerTransfer)
    {
        $customerEntity = new SpyCustomer();
        $customerEntity->fromArray($customerTransfer->toArray());
        $customerEntity->setCustomerReference($this->customerReferenceGenerator->generateCustomerReference($customerTransfer));
        $customerEntity->save();

        return $customerEntity;
    }

    /**
     * @param SpyCustomer $customerEntity
     * @param array $keyValues
     */
    protected function hydrateAddressTransfer(SpyCustomer $customerEntity, array $keyValues)
    {
        $addressTransfer = new AddressTransfer();
        if ($keyValues['countryiso'] != null) {
            $countryId = $this->countryFacade->getIdCountryByIso2Code($keyValues['countryiso']);
            $addressTransfer->setFkCountry($countryId);
        }

        $addressTransfer->fromArray($keyValues, true);
        $addressTransfer->setFkCustomer($customerEntity->getIdCustomer());
        $this->saveCustomerAddress($addressTransfer);
    }

    /**
     * @param AddressTransfer $addressTransfer
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function saveCustomerAddress(AddressTransfer $addressTransfer)
    {
        try {
            $addressEntity = new SpyCustomerAddress();
            $addressEntity->fromArray($addressTransfer->toArray());
            $addressEntity->save();
        } catch (\Exception $e) {
            #var_dump($e);
            #die;
        }
    }

    /**
     * @param string $email
     * @return bool
     */
    protected function findCustomerByEmail($email)
    {
        $customerEntity = $this->customerQueryContainer->queryCustomerByEmail($email)->findOne();

        return (bool)($customerEntity != null);
    }

}
