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
    const TEST_EMAIL = 'functional.test@test.com';
    const TEST_PASSWORD = '12345678';

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
            ->setEmail(self::TEST_EMAIL)
            ->setRegistered(new \DateTime('now'))
            ->setMagentoPasswordHash('921fe44880615a8da20ea26e2f721084:A1XIsc0D9P02HrQdgovipYBKgNXIwgJ5'); //real password : 12345678
        $customer->save();
    }


    public function testMigrateMagentoPasswordSuccessful()
    {
        $customerTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerTransfer
            ->setEmail(self::TEST_EMAIL)
            ->setPassword(self::TEST_PASSWORD);

        //check if password successfully copied to new password field
        $isPasswordMigrated = $this->customerFacade->migratePassword($customerTransfer);
        $this->assertTrue($isPasswordMigrated);
        $this->assertNotNull($this->getCustomerEntityByEmail(self::TEST_EMAIL)->getPassword());

        //check new password encryption
        $updatedCustomer = new CustomerTransfer();
        $updatedCustomer
            ->setEmail(self::TEST_EMAIL)
            ->setPassword(self::TEST_PASSWORD);

        $isNewPasswordValid = $this->customerFacade->tryAuthorizeCustomerByEmailAndPassword($updatedCustomer);
        $this->assertTrue($isNewPasswordValid);
    }

    public function testMigrateMagentoPasswordFailed()
    {
        $customerTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerTransfer
            ->setEmail(self::TEST_EMAIL)
            ->setPassword('wrong_password');

        $isPasswordMigrated = $this->customerFacade->migratePassword($customerTransfer);

        $this->assertFalse($isPasswordMigrated);
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
