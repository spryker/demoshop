<?php

namespace Pyz\Zed\Customer\Business\Model;

use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use Orm\Zed\Customer\Persistence\SpyCustomer;

class MagentoPasswordManager implements MagentoPasswordManagerInterface
{
    /**
     * @var CustomerInterface
     */
    protected $customerInterface;

    /**
     * @var CustomerQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param CustomerInterface $customerInterface
     * @param CustomerQueryContainerInterface $queryContainer
     */
    public function __construct(
        CustomerInterface $customerInterface,
        CustomerQueryContainerInterface $queryContainer
    ){
        $this->customerInterface = $customerInterface;
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function migratePassword(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        if ($this->isValidEmail($customerTransfer->getEmail()) && $this->hasMagentoPassword($customerTransfer)) {

            $customerEntity = $this->findCustomerByEmail($customerTransfer->getEmail());

            $password = $customerTransfer->getPassword();
            $hash = $customerEntity->getMagentoPasswordHash();

            $isPasswordValid = $this->isPasswordValid($password, $hash);

            if ($isPasswordValid) {
                $this->writeMagentoPasswordAsCustomerPassword($customerEntity, $password);
                $this->deleteMagentoPassword($customerEntity);

                return true;
            }
        }
        return false;
    }

    /**
     * @param string $email
     * @return bool
     */
    protected function isValidEmail($email)
    {
        return (bool) ($this->findCustomerByEmail($email) != null);
    }

    /**
     * @param SpyCustomer $customerEntity
     * @param string $password
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function writeMagentoPasswordAsCustomerPassword(SpyCustomer $customerEntity, $password)
    {
        $updatedCustomerTransfer = new CustomerTransfer();
        $updatedCustomerTransfer->setPassword($password);

        $updatedCustomerTransfer = $this->customerInterface->encryptPassword($updatedCustomerTransfer);
        $customerEntity
            ->setPassword($updatedCustomerTransfer->getPassword())
            ->save();
    }

    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerTransfer
     * @return bool
     */
    public function hasMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerTransfer)
    {
        $customerEntity = $this->findCustomerByEmail($customerTransfer->getEmail());

        return (bool) (!$customerEntity->getMagentoPasswordHash() == null);
    }

    /**
     * @param SpyCustomer $customerEntity
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function deleteMagentoPassword(SpyCustomer $customerEntity)
    {
        $customerEntity
            ->setMagentoPasswordHash(null)
            ->save();
    }

    /**
     * @param string $email
     * @return SpyCustomer
     */
    protected function findCustomerByEmail($email)
    {
        return $this->queryContainer->queryCustomerByEmail($email)
            ->findOne();
    }

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    protected function isPasswordValid($password, $hash)
    {
        $hashArr = explode(':', $hash);
        switch (count($hashArr)) {
            case 1:
                return $this->cryptPassword($password)  === $hash;
            case 2:
                return $this->cryptPassword($hashArr[1] . $password) === $hashArr[0];
        }
        return false;
    }


    /**
     * @param string $data
     * @return string
     */
    protected function cryptPassword($data)
    {
        return md5($data);
    }

}
