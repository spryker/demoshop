<?php

namespace Functional\Pyz\Zed\Customer;

use Codeception\TestCase\Test;
use Generated\Shared\Transfer\CustomerMagentoPasswordMigrationTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use SprykerEngine\Zed\Kernel\Locator;
use Pyz\Zed\Customer\Business\CustomerFacade;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainer;
use Generated\Zed\Ide\AutoCompletion;

/**
 * @group MagentoMigration
 */
class MagentoPasswordMigrationTest extends Test
{
    const TEST1_EMAIL = 'functional.test1@test.com';
    const TEST1_PASSWORD = '12345678';
    const TEST1_MAGENTO_ENCRYPTED_PASSWORD = '921fe44880615a8da20ea26e2f721084:A1XIsc0D9P02HrQdgovipYBKgNXIwgJ5';

    const TEST2_EMAIL = 'functional.test2@test.com';
    const TEST2_PASSWORD = 'ThisP@$$w0rdIsBoring';
    const TEST2_MAGENTO_ENCRYPTED_PASSWORD = '5d27bcdddc67af77bba30b5194bb4cc9:nC9LmkGsZO8CQormuK9SLlf8lLsFYuod';

    const TEST3_EMAIL = 'functional.test3@test.com';
    const TEST3_PASSWORD = 'randomPassword';

    /**
     * @var CustomerFacade
     */
    protected $customerFacade;

    /**
     * @var AutoCompletion
     */
    protected $locator;

    /**
     * @var CustomerQueryContainer
     */
    protected $customerQueryContainer;

    public function setUp()
    {
        parent::setUp();

        $this->locator = Locator::getInstance();
        $this->customerFacade = $this->locator->customer()->facade();
        $this->customerQueryContainer = $this->locator->customer()->queryContainer();

        $this->setTestData();
    }

    public function setTestData()
    {
        $customer = new SpyCustomer();
        $customer
            ->setCustomerReference('CUSTOMER_REF')
            ->setEmail(self::TEST1_EMAIL)
            ->setRegistered(new \DateTime('now'))
            ->setMagentoPasswordHash(self::TEST1_MAGENTO_ENCRYPTED_PASSWORD);
        $customer->save();

        $customer = new SpyCustomer();
        $customer
            ->setCustomerReference('CUSTOMER_REF2')
            ->setEmail(self::TEST2_EMAIL)
            ->setRegistered(new \DateTime('now'))
            ->setMagentoPasswordHash(self::TEST2_MAGENTO_ENCRYPTED_PASSWORD);
        $customer->save();

        $customer = new SpyCustomer();
        $customer
            ->setCustomerReference('CUSTOMER_REF3')
            ->setEmail(self::TEST3_EMAIL)
            ->setRegistered(new \DateTime('now'))
            ->setPassword(self::TEST3_PASSWORD);
        $customer->save();
    }

    public function testMigrationFailBecauseAlreadyPassword()
    {
        $customerTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerTransfer
            ->setEmail(self::TEST3_EMAIL)
            ->setPassword('wrong_password');

        $isPasswordMigrated = $this->customerFacade->migratePassword($customerTransfer);

        $this->assertFalse($isPasswordMigrated);
    }

    public function testMigrateMagentoPasswordFailed()
    {
        $customerTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerTransfer
            ->setEmail(self::TEST1_EMAIL)
            ->setPassword('wrong_password');

        $isPasswordMigrated = $this->customerFacade->migratePassword($customerTransfer);

        $this->assertFalse($isPasswordMigrated);
    }

    public function testMigrateMagentoPasswordSuccessful()
    {
        $this->successfulMigration(self::TEST1_EMAIL, self::TEST1_PASSWORD);
        $this->successfulMigration(self::TEST2_EMAIL, self::TEST2_PASSWORD);
    }

    /**
     * @param string $email
     * @param string $password
     */
    protected function successfulMigration($email, $password)
    {
        $this->assertNull($this->getCustomerEntityByEmail($email)->getPassword());

        $customerTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerTransfer
            ->setEmail($email)
            ->setPassword($password);

        //check if password successfully copied to new password field
        $isPasswordMigrated = $this->customerFacade->migratePassword($customerTransfer);
        $this->assertTrue($isPasswordMigrated);
        $this->assertNotNull($this->getCustomerEntityByEmail($email)->getPassword());

        //check new password encryption
        $updatedCustomer = new CustomerTransfer();
        $updatedCustomer
            ->setEmail($email)
            ->setPassword($password);

        $isNewPasswordValid = $this->customerFacade->tryAuthorizeCustomerByEmailAndPassword($updatedCustomer);
        $this->assertTrue($isNewPasswordValid);
    }

    /**
     * @param $email
     * @return SpyCustomer
     */
    protected function getCustomerEntityByEmail($email)
    {
        return $this->customerQueryContainer->queryCustomerByEmail($email)->findOne();
    }

}
