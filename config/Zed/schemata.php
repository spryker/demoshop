<?php
/**
 * Add all Propel schema files that should be used by Propel's installer
 *
 * Shortcuts:
 * APPLICATION_CORE.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'components'
 * APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'components'
 * APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'
 *
 * Use schemata.php for schemata for all environments, use schemata-development for additional dev-requirements
 */

/**
 * @var $schemata array
 */
$schemata = array(
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Cart/Persistence/sao_cart.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Salesrule/Persistence/sao_salesrule.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Legacy/Persistence/sao_legacy.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Sales/Persistence/sao_sales.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Fulfillment/Persistence/sao_fulfillment.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Catalog/Persistence/sao_catalog.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Mail/Persistence/sao_mail.schema.xml',
    APPLICATION_PROJECT.DIRECTORY_SEPARATOR.'Sao'.DIRECTORY_SEPARATOR.'Zed'.DIRECTORY_SEPARATOR.'/Misc/Persistence/sao_misc.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/acl-package/ProjectA/Zed/Acl/Persistence/pac_acl.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/cart-package/ProjectA/Zed/Cart/Persistence/pac_cart.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/catalog-package/ProjectA/Zed/Catalog/Persistence/pac_catalog.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/catalog-package/ProjectA/Zed/Category/Persistence/pac_category.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/dwh-package/ProjectA/Zed/Dwh/Persistence/pac_dwh.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/catalog-package/ProjectA/Zed/Image/Persistence/pac_image.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/catalog-package/ProjectA/Zed/Price/Persistence/pac_price.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/catalog-package/ProjectA/Zed/Stock/Persistence/pac_stock.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/checkout-package/ProjectA/Zed/PaymentControl/Persistence/pac_payment_control.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/checkout-package/ProjectA/Zed/Salesrule/Persistence/pac_salesrule.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/content-package/ProjectA/Zed/Cms/Persistence/pac_cms.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/crm-package/ProjectA/Zed/Customer/Persistence/pac_customer.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/crm-package/ProjectA/Zed/Mail/Persistence/pac_mail.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/crm-package/ProjectA/Zed/Newsletter/Persistence/pac_newsletter.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/frontend-package/ProjectA/Zed/Yves/Persistence/pac_yves.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/infrastructure-package/ProjectA/Zed/Misc/Persistence/pac_misc.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/marketing-package/ProjectA/Zed/Mci/Persistence/pac_mci.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/marketing-package/ProjectA/Zed/Mcm/Persistence/pac_mcm.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/marketing-package/ProjectA/Zed/Tracking/Persistence/pac_tracking.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/sales-package/ProjectA/Zed/Invoice/Persistence/pac_invoice.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/payment-package/ProjectA/Zed/Payment/Persistence/pac_payment.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/adyen-package/ProjectA/Zed/Adyen/Persistence/pac_adyen.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/sales-package/ProjectA/Zed/Sales/Persistence/pac_sales.schema.xml',
    APPLICATION_VENDOR_DIR.DIRECTORY_SEPARATOR.'project-a'.'/glossary-package/ProjectA/Zed/Glossary/Persistence/pac_glossary.schema.xml',
);
