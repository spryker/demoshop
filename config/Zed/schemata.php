<?php
/**
 * Add all Propel schema files that should be used by Propel's installer
 *
 * Shortcuts:
 * APPLICATION_CORE . '/Zed' . '/application' . '/components'
 * APPLICATION_SOURCE_DIR . '/Zed' . '/application' . '/components'
 * APPLICATION_VENDOR_DIR . '/project-a'
 *
 * Use schemata.php for schemata for all environments
 */

return array(
    APPLICATION_VENDOR_DIR . '/project-a/acl-package/src/ProjectA/Zed/Acl/Persistence/pac_acl.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/cart-package/src/ProjectA/Zed/Cart/Persistence/pac_cart.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/catalog-package/src/ProjectA/Zed/Catalog/Persistence/pac_catalog.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/catalog-package/src/ProjectA/Zed/Category/Persistence/pac_category.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/catalog-package/src/ProjectA/Zed/ProductImage/Persistence/pac_catalog_product_image.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/catalog-package/src/ProjectA/Zed/Price/Persistence/pac_price.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/catalog-package/src/ProjectA/Zed/Stock/Persistence/pac_stock.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/checkout-package/src/ProjectA/Zed/Salesrule/Persistence/pac_salesrule.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/content-package/src/ProjectA/Zed/Cms/Persistence/pac_cms.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/src/ProjectA/Zed/Customer/Persistence/pac_customer.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/src/ProjectA/Zed/Mail/Persistence/pac_mail.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/src/ProjectA/Zed/Newsletter/Persistence/pac_newsletter.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/document-package/src/ProjectA/Zed/Document/Persistence/pac_document.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/dwh-package/src/ProjectA/Zed/Dwh/Persistence/pac_dwh.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/frontend-package/src/ProjectA/Zed/Yves/Persistence/pac_yves.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/src/ProjectA/Zed/Misc/Persistence/pac_misc.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/kendo-package/src/ProjectA/Zed/Kendo/Persistence/pac_kendo.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/src/ProjectA/Zed/Invoice/Persistence/pac_invoice.schema.xml',
//    APPLICATION_VENDOR_DIR . '/project-a/payment-package/src/ProjectA/Zed/PaymentControl/Persistence/pac_payment_control.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/payment-package/src/ProjectA/Zed/Payment/Persistence/pac_payment.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/payone-package/src/ProjectA/Zed/Payone/Persistence/pac_payone.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/adyen-package/src/ProjectA/Zed/Adyen/Persistence/pac_adyen.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/src/ProjectA/Zed/Sales/Persistence/pac_sales.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/glossary-package/src/ProjectA/Zed/Glossary/Persistence/pac_glossary.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/src/ProjectA/Zed/Mcm/Persistence/pac_mcm.schema.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/src/ProjectA/Zed/Mci/Persistence/pac_mci.schema.xml',
);
