<?php

namespace Functional\Pyz\Zed\AfterbuyExport;

use Codeception\TestCase\Test;
use Functional\SprykerFeature\Zed\Sales\Business\Dependency\CountryFacade;
use Functional\SprykerFeature\Zed\Sales\Business\Dependency\OmsFacade;
use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Generated\Shared\Transfer\SalesOrderItemTransfer;
use Pyz\Zed\OrderExporter\Business\Model\AfterbuyResponseWriter;
use Pyz\Zed\OrderExporter\Business\OrderExporterFacade;
use Pyz\Zed\OrderExporter\OrderExporterDependencyProvider;
use Pyz\Zed\OrderExporter\Persistence\OrderExporterQueryContainer;
use Pyz\Zed\Sales\Business\SalesFacade;
use Pyz\Zed\Sales\Persistence\SalesQueryContainer;
use SprykerEngine\Zed\Kernel\Business\Factory;
use SprykerEngine\Zed\Kernel\Container;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Country\Persistence\CountryQueryContainer;
use SprykerFeature\Zed\Oms\Persistence\OmsQueryContainer;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderAddress;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Sales\SalesDependencyProvider;
use SprykerFeature\Zed\SequenceNumber\Business\SequenceNumberFacade;

/**
 * @group AfterbuyTest
 */
class OrderExporterTest extends Test
{
    /**
     * @var SpySalesOrderItem []
     */
    private $orderItems = [];
    /**
     * @var OrderExporterFacade
     */
    private $orderExporterFacade;
    /**
     * @var int
     */
    private $orderId;

    public function setUp()
    {
        parent::setUp();

        $locator = Locator::getInstance();

        $countryFacade = new CountryFacade(new Factory('Country'), $locator);
        $countryFacade->setOwnQueryContainer(new CountryQueryContainer(new \SprykerEngine\Zed\Kernel\Persistence\Factory('Country'), $locator));

        $omsFacade = new OmsFacade(new Factory('Oms'), $locator);
        $omsFacade->setOwnQueryContainer(new OmsQueryContainer(new \SprykerEngine\Zed\Kernel\Persistence\Factory('Oms'), $locator));

        $sequenceNumberFacade = new SequenceNumberFacade(new Factory('SequenceNumber'), $locator);
        $container = new Container();
        $container[SalesDependencyProvider::FACADE_COUNTRY] = $countryFacade;
        $container[SalesDependencyProvider::FACADE_OMS] = $omsFacade;
        $container[SalesDependencyProvider::FACADE_SEQUENCE_NUMBER] = $sequenceNumberFacade;

        $salesFacade = new SalesFacade(new Factory('Sales'), $locator);
        $salesFacade->setOwnQueryContainer(new SalesQueryContainer(new \SprykerEngine\Zed\Kernel\Persistence\Factory('Sales'), $locator));
        $salesFacade->setExternalDependencies($container);

        $container = new Container();
        $container[OrderExporterDependencyProvider::FACADE_SALES] = $salesFacade;

        $this->orderExporterFacade = new OrderExporterFacade(new Factory('OrderExporter'), $locator);
        $this->orderExporterFacade->setOwnQueryContainer(new OrderExporterQueryContainer(new \SprykerEngine\Zed\Kernel\Persistence\Factory('OrderExporter'), $locator));
        $this->orderExporterFacade->setExternalDependencies($container);

        $this->setTestData();
    }

    public function setTestData()
    {
        $billingAddressEntity = new SpySalesOrderAddress();
        $billingAddressEntity
            ->setFkCountry(60)
            ->setFirstName('test')
            ->setLastName('test')
            ->setAddress1('teststr')
            ->setAddress2('1')
            ->setCity('test')
            ->setZipCode(11111)
            ->setEmail('test@test.com');
        $billingAddressEntity->save();

        $shippingAddressEntity = new SpySalesOrderAddress();
        $shippingAddressEntity
            ->setFkCountry(60)
            ->setFirstName('test')
            ->setLastName('test')
            ->setAddress1('teststr')
            ->setAddress2('1')
            ->setCity('test')
            ->setZipCode(11111)
            ->setEmail('test@test.com');
        $shippingAddressEntity->save();

        $orderEntity = new SpySalesOrder();
        $orderEntity
            ->setEmail('test@test.com')
            ->setFirstName('test')
            ->setLastName('test')
            ->setOrderReference('test')
            ->setGrandTotal(100)
            ->setSubtotal(100)
            ->setShippingAddress($shippingAddressEntity)
            ->setBillingAddress($billingAddressEntity);
        $orderEntity->save();

        $this->orderId = $orderEntity->getIdSalesOrder();

        $orderItemEntity_1 = new SpySalesOrderItem();
        $orderItemEntity_1
            ->setFkSalesOrder($orderEntity->getIdSalesOrder())
            ->setGrossPrice(100)
            ->setPriceToPay(100)
            ->setName('test')
            ->setFkOmsOrderItemState(7)
            ->setSku('test');
        $orderItemEntity_1->save();

        $this->orderItems[] = $orderItemEntity_1;

        $orderItemEntity_2 = new SpySalesOrderItem();
        $orderItemEntity_2
            ->setFkSalesOrder($orderEntity->getIdSalesOrder())
            ->setGrossPrice(100)
            ->setPriceToPay(100)
            ->setName('test')
            ->setFkOmsOrderItemState(7)
            ->setSku('test');
        $orderItemEntity_2->save();

        $this->orderItems[] = $orderItemEntity_2;
    }

    public function testCreateRequest()
    {
        $this->orderExporterFacade->exportOrderItems($this->orderItems);
        foreach ($this->orderItems as $orderItem) {
            $entity = $this->orderExporterFacade->findOrderItemAfterbuyExportByItemId($orderItem->getIdSalesOrderItem());
            $this->assertTrue($entity !== null);
        }
    }

    public function testExportFailed()
    {
        $afterbuyResponse = '<?xml version="1.0" encoding="iso-8859-1" ?> <result><br />
  <success>0</success><br />
  <errorlist><br />
<error>Bitte geben Sie einen Wert im Feld Land an.</error> <error>Bitte geben Sie einen Wert im Feld KLLand an.</error>
  </errorlist>
</result>
';
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $afterbuyTransfer
            ->setHttpStatusCode('200')
            ->setRequest('test')
            ->setOrderItems($this->createOrderItemsTransfer($this->orderItems)) // @TODO think about it
            ->setOrderId($this->orderId);

        $mockEmailSender = $this->getMockBuilder('\Pyz\Zed\OrderExporter\Business\Model\MailSender')
            ->disableOriginalConstructor()
            ->getMock();

        $mockEmailSender->method('sendAfterbuyResultMail')->willReturn(true);

        $afterbuyResponseWriter = new AfterbuyResponseWriter($mockEmailSender);

        $afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $afterbuyResponse);

        foreach ($this->orderItems as $orderItem) {
            $afterbuyResponseEntity = $this->orderExporterFacade->findOrderItemAfterbuyExportByItemId($orderItem->getIdSalesOrderItem());
            $this->assertFalse($afterbuyResponseEntity->getSuccess());
            $this->assertNotNull($afterbuyResponseEntity->getVirtualColumn('errorsList'));
            $this->assertFalse($afterbuyResponseEntity->getVirtualColumn('isTest'));
        }
    }

    public function testExportSuccessful()
    {
        $afterbuyResponse = '<?xml version="1.0" encoding="iso-8859-1" ?>
<result>
    <success>1</success>
    <Action>new</Action>
    <data>
        <AID>377398057</AID>
        <UID>{320fe2d5-3eb2-4bec-a184-0de26b28b224}</UID>
        <KundenNr>252005782</KundenNr>
        <EKundenNr>16376</EKundenNr>
        <CouponUsed>0</CouponUsed>
    </data>
</result>
';
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $afterbuyTransfer
            ->setHttpStatusCode('200')
            ->setRequest('test')
            ->setOrderItems($this->createOrderItemsTransfer($this->orderItems)) // @TODO think about it
            ->setOrderId($this->orderId);

        $mockEmailSender = $this->getMockBuilder('\Pyz\Zed\OrderExporter\Business\Model\MailSender')
            ->disableOriginalConstructor()
            ->getMock();

        $mockEmailSender->method('sendAfterbuyResultMail')->willReturn(true);

        $afterbuyResponseWriter = new AfterbuyResponseWriter($mockEmailSender);

        $afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $afterbuyResponse);

        foreach ($this->orderItems as $orderItem) {
            $afterbuyResponseEntity = $this->orderExporterFacade->findOrderItemAfterbuyExportByItemId($orderItem->getIdSalesOrderItem());
            $this->assertTrue($afterbuyResponseEntity->getSuccess());
            $this->assertNull($afterbuyResponseEntity->getVirtualColumn('errorsList'));
            $this->assertFalse($afterbuyResponseEntity->getVirtualColumn('isTest'));
        }
    }

    public function testExportNotValidXml()
    {
        $afterbuyResponse = 'TEST';
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $afterbuyTransfer
            ->setHttpStatusCode('200')
            ->setRequest('test')
            ->setOrderItems($this->createOrderItemsTransfer($this->orderItems)) // @TODO think about it
            ->setOrderId($this->orderId);

        $mockEmailSender = $this->getMockBuilder('\Pyz\Zed\OrderExporter\Business\Model\MailSender')
            ->disableOriginalConstructor()
            ->getMock();

        $mockEmailSender->method('sendAfterbuyResultMail')->willReturn(true);

        $afterbuyResponseWriter = new AfterbuyResponseWriter($mockEmailSender);

        $afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $afterbuyResponse);

        foreach ($this->orderItems as $orderItem) {
            $afterbuyResponseEntity = $this->orderExporterFacade->findOrderItemAfterbuyExportByItemId($orderItem->getIdSalesOrderItem());
            $this->assertFalse($afterbuyResponseEntity->getSuccess());
            $this->assertNull($afterbuyResponseEntity->getVirtualColumn('errorsList'));
            $this->assertFalse($afterbuyResponseEntity->getVirtualColumn('isTest'));
        }
    }

    /**
     * @param SpySalesOrderItem [] $orderItems
     * @return array
     */
    protected function createOrderItemsTransfer(array $orderItems)
    {
        $orderItemTransfers = new \ArrayObject();

        foreach ($orderItems as $orderItem) {
            $orderItemTransfer = new SalesOrderItemTransfer();
            $orderItemTransfer->setOrderItemId($orderItem->getIdSalesOrderItem());
            $orderItemTransfers[] = $orderItemTransfer;
        }

        return $orderItemTransfers;
    }

}
