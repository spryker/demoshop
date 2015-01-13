<?php 

namespace Generated\Zed;

use Generated\Zed\Acl\Business\AclFactory;
use Generated\Zed\Calculation\Business\CalculationFactory;
use Generated\Zed\Cart\Business\CartFactory;
use Generated\Zed\Catalog\Business\CatalogFactory;
use Generated\Zed\Category\Business\CategoryFactory;
use Generated\Zed\CategoryExporter\Business\CategoryExporterFactory;
use Generated\Zed\CategoryTree\Business\CategoryTreeFactory;
use Generated\Zed\Checkout\Business\CheckoutFactory;
use Generated\Zed\Cms\Business\CmsFactory;
use Generated\Zed\Customer\Business\CustomerFactory;
use Generated\Zed\DbDump\Business\DbDumpFactory;
use Generated\Zed\DemoPayment\Business\DemoPaymentFactory;
use Generated\Zed\Document\Business\DocumentFactory;
use Generated\Zed\Feed\Business\FeedFactory;
use Generated\Zed\Glossary\Business\GlossaryFactory;
use Generated\Zed\Installer\Business\InstallerFactory;
use Generated\Zed\Invoice\Business\InvoiceFactory;
use Generated\Zed\Kendo\Business\KendoFactory;
use Generated\Zed\Lumberjack\Business\LumberjackFactory;
use Generated\Zed\Mail\Business\MailFactory;
use Generated\Zed\Misc\Business\MiscFactory;
use Generated\Zed\Newsletter\Business\NewsletterFactory;
use Generated\Zed\Oms\Business\OmsFactory;
use Generated\Zed\Payment\Business\PaymentFactory;
use Generated\Zed\PaymentControl\Business\PaymentControlFactory;
use Generated\Zed\Payone\Business\PayoneFactory;
use Generated\Zed\Price\Business\PriceFactory;
use Generated\Zed\Product\Business\ProductFactory;
use Generated\Zed\ProductCategory\Business\ProductCategoryFactory;
use Generated\Zed\ProductExporter\Business\ProductExporterFactory;
use Generated\Zed\ProductImage\Business\ProductImageFactory;
use Generated\Zed\Sales\Business\SalesFactory;
use Generated\Zed\Salesrule\Business\SalesruleFactory;
use Generated\Zed\Setup\Business\SetupFactory;
use Generated\Zed\Stock\Business\StockFactory;
use Generated\Zed\System\Business\SystemFactory;
use Generated\Zed\Yves\Business\YvesFactory;
use Generated\Zed\YvesExport\Business\YvesExportFactory;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class DependencyInjectionContainer
{

    /**
     * @param $model
     * @param \ProjectA\Zed\Library\Business\FactoryInterface $factory
     */
    public function doInjection($model, \ProjectA\Zed\Library\Business\FactoryInterface $factory = null)
    {
        if ($factory && $model instanceof \ProjectA\Zed\Library\Dependency\DependencyFactoryInterface) {
            $model->setFactory($factory);
        }
        if ($model instanceof \Generated\Zed\Acl\Business\Dependency\AclFacadeInterface) {
            $model->setFacadeAcl((new AclFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Calculation\Business\Dependency\CalculationFacadeInterface) {
            $model->setFacadeCalculation((new CalculationFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Cart\Business\Dependency\CartFacadeInterface) {
            $model->setFacadeCart((new CartFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Catalog\Business\Dependency\CatalogFacadeInterface) {
            $model->setFacadeCatalog((new CatalogFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Category\Business\Dependency\CategoryFacadeInterface) {
            $model->setFacadeCategory((new CategoryFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\CategoryExporter\Business\Dependency\CategoryExporterFacadeInterface) {
            $model->setFacadeCategoryExporter((new CategoryExporterFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\CategoryTree\Business\Dependency\CategoryTreeFacadeInterface) {
            $model->setFacadeCategoryTree((new CategoryTreeFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Checkout\Business\Dependency\CheckoutFacadeInterface) {
            $model->setFacadeCheckout((new CheckoutFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Cms\Business\Dependency\CmsFacadeInterface) {
            $model->setFacadeCms((new CmsFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Customer\Business\Dependency\CustomerFacadeInterface) {
            $model->setFacadeCustomer((new CustomerFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\DbDump\Business\Dependency\DbDumpFacadeInterface) {
            $model->setFacadeDbDump((new DbDumpFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\DemoPayment\Business\Dependency\DemoPaymentFacadeInterface) {
            $model->setFacadeDemoPayment((new DemoPaymentFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Feed\Business\Dependency\FeedFacadeInterface) {
            $model->setFacadeFeed((new FeedFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Glossary\Business\Dependency\GlossaryFacadeInterface) {
            $model->setFacadeGlossary((new GlossaryFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Installer\Business\Dependency\InstallerFacadeInterface) {
            $model->setFacadeInstaller((new InstallerFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Invoice\Business\Dependency\InvoiceFacadeInterface) {
            $model->setFacadeInvoice((new InvoiceFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Kendo\Business\Dependency\KendoFacadeInterface) {
            $model->setFacadeKendo((new KendoFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Lumberjack\Business\Dependency\LumberjackFacadeInterface) {
            $model->setFacadeLumberjack((new LumberjackFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Mail\Business\Dependency\MailFacadeInterface) {
            $model->setFacadeMail((new MailFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Misc\Business\Dependency\MiscFacadeInterface) {
            $model->setFacadeMisc((new MiscFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Newsletter\Business\Dependency\NewsletterFacadeInterface) {
            $model->setFacadeNewsletter((new NewsletterFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Oms\Business\Dependency\OmsFacadeInterface) {
            $model->setFacadeOms((new OmsFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Payment\Business\Dependency\PaymentFacadeInterface) {
            $model->setFacadePayment((new PaymentFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\PaymentControl\Business\Dependency\PaymentControlFacadeInterface) {
            $model->setFacadePaymentControl((new PaymentControlFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Payone\Business\Dependency\PayoneFacadeInterface) {
            $model->setFacadePayone((new PayoneFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Price\Business\Dependency\PriceFacadeInterface) {
            $model->setFacadePrice((new PriceFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Product\Business\Dependency\ProductFacadeInterface) {
            $model->setFacadeProduct((new ProductFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\ProductCategory\Business\Dependency\ProductCategoryFacadeInterface) {
            $model->setFacadeProductCategory((new ProductCategoryFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\ProductExporter\Business\Dependency\ProductExporterFacadeInterface) {
            $model->setFacadeProductExporter((new ProductExporterFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\ProductImage\Business\Dependency\ProductImageFacadeInterface) {
            $model->setFacadeProductImage((new ProductImageFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Sales\Business\Dependency\SalesFacadeInterface) {
            $model->setFacadeSales((new SalesFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Salesrule\Business\Dependency\SalesruleFacadeInterface) {
            $model->setFacadeSalesrule((new SalesruleFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Setup\Business\Dependency\SetupFacadeInterface) {
            $model->setFacadeSetup((new SetupFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Stock\Business\Dependency\StockFacadeInterface) {
            $model->setFacadeStock((new StockFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\System\Business\Dependency\SystemFacadeInterface) {
            $model->setFacadeSystem((new SystemFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\Yves\Business\Dependency\YvesFacadeInterface) {
            $model->setFacadeYves((new YvesFactory())->createFacade());
        }
        if ($model instanceof \Generated\Zed\YvesExport\Business\Dependency\YvesExportFacadeInterface) {
            $model->setFacadeYvesExport((new YvesExportFactory())->createFacade());
        }
        if ($model instanceof \ProjectA\Zed\Library\Dependency\DependencyInitInterface) {
            $model->initAfterDependencyInjection();
        }
    }


}
