<?php

namespace Generated\Zed\Ide;

/**
 * @method \ProjectA\Zed\Acl\Business\AclFacade facade()
 * @method \ProjectA\Shared\Acl\Transfer\Group transferGroup()
 * @method \ProjectA\Shared\Acl\Transfer\GroupCollection transferGroupCollection()
 * @method \ProjectA\Shared\Acl\Transfer\GroupPrivilege transferGroupPrivilege()
 * @method \ProjectA\Shared\Acl\Transfer\GroupPrivilegeCollection transferGroupPrivilegeCollection()
 * @method \ProjectA\Shared\Acl\Transfer\Resource transferResource()
 * @method \ProjectA\Shared\Acl\Transfer\ResourceCollection transferResourceCollection()
 * @method \ProjectA\Shared\Acl\Transfer\Role transferRole()
 * @method \ProjectA\Shared\Acl\Transfer\RoleCollection transferRoleCollection()
 * @method \ProjectA\Shared\Acl\Transfer\User transferUser()
 * @method \ProjectA\Shared\Acl\Transfer\UserCollection transferUserCollection()
 */
interface Acl
{}

/**
 * @method \ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\RoutingServiceProvider pluginServiceProviderRoutingServiceProvider()
 * @method \ProjectA\Shared\Application\Communication\Plugin\ServiceProvider\UrlGeneratorServiceProvider pluginServiceProviderUrlGeneratorServiceProvider()
 */
interface Application
{}

/**
 * @method \ProjectA\Zed\Availability\Business\AvailabilityFacade facade()
 * @method \ProjectA\Zed\Availability\Persistence\AvailabilityQueryContainer queryContainer()
 */
interface Availability
{}

/**
 * @method \ProjectA\Zed\Calculation\Business\CalculationFacade facade()
 */
interface Calculation
{}

/**
 * @method \ProjectA\Zed\Cart\Business\CartFacade facade()
 * @method \ProjectA\Shared\Cart\Transfer\CartChange transferCartChange()
 * @method \ProjectA\Shared\Cart\Transfer\CartItem transferCartItem()
 * @method \ProjectA\Shared\Cart\Transfer\CartItemCollection transferCartItemCollection()
 * @method \ProjectA\Shared\Cart\Transfer\StepStorage transferStepStorage()
 */
interface Cart
{}

/**
 * @method \Pyz\Zed\Catalog\Business\CatalogFacade facade()
 * @method \ProjectA\Shared\Catalog\Transfer\Attribute transferAttribute()
 * @method \ProjectA\Shared\Catalog\Transfer\AttributeCollection transferAttributeCollection()
 * @method \ProjectA\Shared\Catalog\Transfer\AttributeSet transferAttributeSet()
 * @method \ProjectA\Shared\Catalog\Transfer\AttributeSetCollection transferAttributeSetCollection()
 * @method \ProjectA\Shared\Catalog\Transfer\AttributeSetGroup transferAttributeSetGroup()
 * @method \ProjectA\Shared\Catalog\Transfer\AttributeSetGroupCollection transferAttributeSetGroupCollection()
 * @method \ProjectA\Shared\Catalog\Transfer\ValueType transferValueType()
 * @method \ProjectA\Shared\Catalog\Transfer\ValueTypeCollection transferValueTypeCollection()
 */
interface Catalog
{}

/**
 * @method \ProjectA\Zed\Category\Business\CategoryFacade facade()
 * @method \ProjectA\Shared\Category\Transfer\Attribute transferAttribute()
 * @method \ProjectA\Shared\Category\Transfer\AttributeCollection transferAttributeCollection()
 * @method \ProjectA\Shared\Category\Transfer\Product transferProduct()
 * @method \ProjectA\Shared\Category\Transfer\ProductCollection transferProductCollection()
 * @method \ProjectA\Shared\Category\Transfer\Scope transferScope()
 * @method \ProjectA\Shared\Category\Transfer\ScopeCollection transferScopeCollection()
 */
interface Category
{}

/**
 * @method \ProjectA\Zed\CategoryExporter\Business\CategoryExporterFacade facade()
 */
interface CategoryExporter
{}

/**
 * @method \Pyz\Zed\CategoryTree\Business\CategoryTreeFacade facade()
 * @method \ProjectA\Zed\CategoryTree\Persistence\CategoryTreeQueryContainer queryContainer()
 */
interface CategoryTree
{}

/**
 * @method \ProjectA\Zed\Checkout\Business\CheckoutFacade facade()
 */
interface Checkout
{}

/**
 * @method \ProjectA\Zed\Cms\Business\CmsFacade facade()
 * @method \ProjectA\Zed\Cms\Persistence\CmsQueryContainer queryContainer()
 * @method \ProjectA\Shared\Cms\Transfer\Block transferBlock()
 * @method \ProjectA\Shared\Cms\Transfer\BlockCollection transferBlockCollection()
 * @method \ProjectA\Shared\Cms\Transfer\Page transferPage()
 * @method \ProjectA\Shared\Cms\Transfer\PageAttribute transferPageAttribute()
 * @method \ProjectA\Shared\Cms\Transfer\PageAttributeCollection transferPageAttributeCollection()
 * @method \ProjectA\Shared\Cms\Transfer\PageBlock transferPageBlock()
 * @method \ProjectA\Shared\Cms\Transfer\PageBlockCollection transferPageBlockCollection()
 * @method \ProjectA\Shared\Cms\Transfer\PageCollection transferPageCollection()
 * @method \ProjectA\Shared\Cms\Transfer\Redirection transferRedirection()
 * @method \ProjectA\Shared\Cms\Transfer\RedirectionCollection transferRedirectionCollection()
 * @method \ProjectA\Shared\Cms\Transfer\Template transferTemplate()
 * @method \ProjectA\Shared\Cms\Transfer\TemplateCollection transferTemplateCollection()
 */
interface Cms
{}

/**
 * @method \ProjectA\Zed\Customer\Business\CustomerFacade facade()
 * @method \ProjectA\Shared\Customer\Transfer\Address transferAddress()
 * @method \ProjectA\Shared\Customer\Transfer\AddressCollection transferAddressCollection()
 * @method \ProjectA\Shared\Customer\Transfer\Customer transferCustomer()
 * @method \ProjectA\Shared\Customer\Transfer\CustomerCollection transferCustomerCollection()
 * @method \ProjectA\Shared\Customer\Transfer\Order transferOrder()
 * @method \ProjectA\Shared\Customer\Transfer\OrderCollection transferOrderCollection()
 * @method \ProjectA\Shared\Customer\Transfer\OrderItem transferOrderItem()
 * @method \ProjectA\Shared\Customer\Transfer\OrderItemCollection transferOrderItemCollection()
 */
interface Customer
{}

/**
 * @method \ProjectA\Zed\Customer2\Business\Customer2Facade facade()
 * @method \ProjectA\Zed\Customer2\Persistence\Customer2QueryContainer queryContainer()
 */
interface Customer2
{}

/**
 * @method \ProjectA\Zed\DbDump\Business\DbDumpFacade facade()
 */
interface DbDump
{}

/**
 * @method \ProjectA\Zed\DemoPayment\Business\DemoPaymentFacade facade()
 */
interface DemoPayment
{}

/**
 * @method \ProjectA\Zed\Document\Business\DocumentFacade facade()
 * @method \ProjectA\Shared\Document\Transfer\DocumentRenderEngine\Collection transferDocumentRenderEngineCollection()
 * @method \ProjectA\Shared\Document\Transfer\DocumentRenderer transferDocumentRenderer()
 * @method \ProjectA\Shared\Document\Transfer\DocumentType\Collection transferDocumentTypeCollection()
 * @method \ProjectA\Shared\Document\Transfer\DocumentType transferDocumentType()
 */
interface Document
{}

/**
 * @method \ProjectA\Zed\Feed\Business\FeedFacade facade()
 */
interface Feed
{}

/**
 * @method \ProjectA\Zed\FrontendExporter\Business\FrontendExporterFacade facade()
 * @method \ProjectA\Zed\FrontendExporter\Persistence\FrontendExporterQueryContainer queryContainer()
 */
interface FrontendExporter
{}

/**
 * @method \ProjectA\Zed\Glossary\Business\GlossaryFacade facade()
 * @method \ProjectA\Zed\Glossary\Persistence\GlossaryQueryContainer queryContainer()
 */
interface Glossary
{}

/**
 * @method \ProjectA\Zed\GlossaryExporter\Persistence\GlossaryExporterQueryContainer queryContainer()
 */
interface GlossaryExporter
{}

/**
 * @method \ProjectA\Zed\Installer\Business\InstallerFacade facade()
 */
interface Installer
{}

/**
 * @method \ProjectA\Zed\Invoice\Business\InvoiceFacade facade()
 */
interface Invoice
{}

/**
 * @method \ProjectA\Zed\Kendo\Business\KendoFacade facade()
 */
interface Kendo
{}

/**
 * @method \SprykerCore\Zed\Locale\Business\LocaleFacade facade()
 * @method \SprykerCore\Zed\Locale\Persistence\LocaleQueryContainer queryContainer()
 */
interface Locale
{}

/**
 * @method \ProjectA\Zed\Lumberjack\Business\LumberjackFacade facade()
 * @method \ProjectA\Shared\Lumberjack\Transfer\MetaRequest transferMetaRequest()
 */
interface Lumberjack
{}

/**
 * @method \Pyz\Zed\Mail\Business\MailFacade facade()
 * @method \ProjectA\Shared\Mail\Transfer\Address transferAddress()
 * @method \ProjectA\Shared\Mail\Transfer\Attachment transferAttachment()
 * @method \ProjectA\Shared\Mail\Transfer\AttachmentCollection transferAttachmentCollection()
 * @method \ProjectA\Shared\Mail\Transfer\Customer transferCustomer()
 * @method \ProjectA\Shared\Mail\Transfer\Item transferItem()
 * @method \ProjectA\Shared\Mail\Transfer\ItemCollection transferItemCollection()
 * @method \ProjectA\Shared\Mail\Transfer\Mail transferMail()
 * @method \ProjectA\Shared\Mail\Transfer\Template transferTemplate()
 */
interface Mail
{}

/**
 * @method \ProjectA\Zed\Misc\Business\MiscFacade facade()
 */
interface Misc
{}

/**
 * @method \ProjectA\Zed\Newsletter\Business\NewsletterFacade facade()
 * @method \ProjectA\Shared\Newsletter\Transfer\Subscription transferSubscription()
 * @method \ProjectA\Shared\Newsletter\Transfer\SubscriptionCollection transferSubscriptionCollection()
 */
interface Newsletter
{}

/**
 * @method \ProjectA\Zed\Oms\Business\OmsFacade facade()
 * @method \ProjectA\Zed\Oms\Persistence\OmsQueryContainer queryContainer()
 */
interface Oms
{}

/**
 * @method \ProjectA\Zed\Payment\Business\PaymentFacade facade()
 * @method \ProjectA\Shared\Payment\Transfer\Config transferConfig()
 * @method \ProjectA\Shared\Payment\Transfer\ConfigCollection transferConfigCollection()
 * @method \ProjectA\Shared\Payment\Transfer\PaymentDataInterface transferPaymentDataInterface()
 * @method \ProjectA\Shared\Payment\Transfer\PaymentMethod transferPaymentMethod()
 * @method \ProjectA\Shared\Payment\Transfer\PaymentMethodCollection transferPaymentMethodCollection()
 */
interface Payment
{}

/**
 * @method \ProjectA\Zed\PaymentControl\Business\PaymentControlFacade facade()
 * @method \ProjectA\Shared\PaymentControl\Transfer\MetaRequest transferMetaRequest()
 */
interface PaymentControl
{}

/**
 * @method \ProjectA\Zed\Payone\Business\PayoneFacade facade()
 * @method \ProjectA\Shared\Payone\Transfer\PaymentPayone transferPaymentPayone()
 */
interface Payone
{}

/**
 * @method \ProjectA\Zed\Price\Business\PriceFacade facade()
 */
interface Price
{}

/**
 * @method \Pyz\Zed\Product\Business\ProductFacade facade()
 * @method \ProjectA\Zed\Product\Persistence\ProductQueryContainer queryContainer()
 */
interface Product
{}

/**
 * @method \Pyz\Zed\ProductCategory\Business\ProductCategoryFacade facade()
 * @method \ProjectA\Zed\ProductCategory\Persistence\ProductCategoryQueryContainer queryContainer()
 */
interface ProductCategory
{}

/**
 * @method \ProjectA\Zed\ProductCategorySearch\Business\ProductCategorySearchFacade facade()
 */
interface ProductCategorySearch
{}

/**
 * @method \ProjectA\Zed\FrontendProductConnector\Business\FrontendProductConnectorFacade facade()
 */
interface ProductFrontendExporterConnector
{}

/**
 * @method \ProjectA\Zed\ProductImage\Business\ProductImageFacade facade()
 */
interface ProductImage
{}

/**
 * @method \Pyz\Zed\ProductSearch\Business\ProductSearchFacade facade()
 * @method \ProjectA\Zed\ProductSearch\Persistence\ProductSearchQueryContainer queryContainer()
 */
interface ProductSearch
{}

/**
 * @method \Pyz\Zed\Sales\Business\SalesFacade facade()
 * @method \ProjectA\Shared\Sales\Transfer\Address transferAddress()
 * @method \ProjectA\Shared\Sales\Transfer\Comment transferComment()
 * @method \ProjectA\Shared\Sales\Transfer\CommentCollection transferCommentCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Document transferDocument()
 * @method \ProjectA\Shared\Sales\Transfer\Invoice transferInvoice()
 * @method \ProjectA\Shared\Sales\Transfer\InvoiceCollection transferInvoiceCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Order transferOrder()
 * @method \ProjectA\Shared\Sales\Transfer\OrderCollection transferOrderCollection()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItem transferOrderItem()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItemCollection transferOrderItemCollection()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItemOption transferOrderItemOption()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItemOptionCollection transferOrderItemOptionCollection()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItemStatus transferOrderItemStatus()
 * @method \ProjectA\Shared\Sales\Transfer\OrderItemStatusCollection transferOrderItemStatusCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Orderprocess\StatemachineTrigger transferOrderprocessStatemachineTrigger()
 * @method \ProjectA\Shared\Sales\Transfer\Payment transferPayment()
 * @method \ProjectA\Shared\Sales\Transfer\Price\Discount transferPriceDiscount()
 * @method \ProjectA\Shared\Sales\Transfer\Price\DiscountCollection transferPriceDiscountCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Price\DiscountTotalItem transferPriceDiscountTotalItem()
 * @method \ProjectA\Shared\Sales\Transfer\Price\DiscountTotalItemCollection transferPriceDiscountTotalItemCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Price\DiscountTotals transferPriceDiscountTotals()
 * @method \ProjectA\Shared\Sales\Transfer\Price\Expense transferPriceExpense()
 * @method \ProjectA\Shared\Sales\Transfer\Price\ExpenseCollection transferPriceExpenseCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Price\ExpenseTotalItem transferPriceExpenseTotalItem()
 * @method \ProjectA\Shared\Sales\Transfer\Price\ExpenseTotalItemCollection transferPriceExpenseTotalItemCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Price\ExpenseTotals transferPriceExpenseTotals()
 * @method \ProjectA\Shared\Sales\Transfer\Price\Tax transferPriceTax()
 * @method \ProjectA\Shared\Sales\Transfer\Price\TaxItem transferPriceTaxItem()
 * @method \ProjectA\Shared\Sales\Transfer\Price\TaxItemCollection transferPriceTaxItemCollection()
 * @method \ProjectA\Shared\Sales\Transfer\Price\Totals transferPriceTotals()
 * @method \ProjectA\Shared\Sales\Transfer\RegularRedirectPaymentCancellation transferRegularRedirectPaymentCancellation()
 */
interface Sales
{}

/**
 * @method \ProjectA\Zed\Salesrule\Business\SalesruleFacade facade()
 * @method \ProjectA\Shared\Salesrule\Transfer\Code transferCode()
 * @method \ProjectA\Shared\Salesrule\Transfer\CodeCollection transferCodeCollection()
 * @method \ProjectA\Shared\Salesrule\Transfer\CodePool transferCodePool()
 * @method \ProjectA\Shared\Salesrule\Transfer\Condition transferCondition()
 * @method \ProjectA\Shared\Salesrule\Transfer\ConditionCollection transferConditionCollection()
 * @method \ProjectA\Shared\Salesrule\Transfer\Item transferItem()
 * @method \ProjectA\Shared\Salesrule\Transfer\Salesrule transferSalesrule()
 */
interface Salesrule
{}

/**
 * @method \ProjectA\Zed\Setup\Business\SetupFacade facade()
 */
interface Setup
{}

/**
 * @method \ProjectA\Zed\Stock\Business\StockFacade facade()
 * @method \ProjectA\Zed\Stock\Persistence\StockQueryContainer queryContainer()
 */
interface Stock
{}

/**
 * @method \ProjectA\Zed\System\Business\SystemFacade facade()
 * @method \ProjectA\Shared\System\Transfer\Test\Child transferTestChild()
 * @method \ProjectA\Shared\System\Transfer\Test\ChildCollection transferTestChildCollection()
 * @method \ProjectA\Shared\System\Transfer\Test\InterfaceChild transferTestInterfaceChild()
 * @method \ProjectA\Shared\System\Transfer\Test\Main transferTestMain()
 */
interface System
{}

/**
 * @method \SprykerCore\Zed\Touch\Business\TouchFacade facade()
 * @method \SprykerCore\Zed\Touch\Persistence\TouchQueryContainer queryContainer()
 */
interface Touch
{}

/**
 * @method \ProjectA\Zed\Yves\Business\YvesFacade facade()
 */
interface Yves
{}

