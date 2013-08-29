<?php
/**
 * Add all Propel schema files that should be used by Propel's installer
 *TODO:change description
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
$navigations = array(
    APPLICATION_VENDOR_DIR . '/project-a/acl-package/ProjectA/Zed/Acl/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/checkout-package/ProjectA/Zed/Salesrule/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/content-package/ProjectA/Zed/Cms/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/ProjectA/Zed/Customer/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/ProjectA/Zed/Mail/Module/navigation.xml',
    APPLICATION_PROJECT . '/Sao/Zed/Mail/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/dwh-package/ProjectA/Zed/Dwh/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/frontend-package/ProjectA/Zed/Yves/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/glossary-package/ProjectA/Zed/Glossary/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/ProjectA/Zed/Lumberjack/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/ProjectA/Zed/Setup/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/ProjectA/Zed/System/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/ProjectA/Zed/Mcm/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/ProjectA/Zed/Adwords/Module/navigation.xml',
    APPLICATION_PROJECT . '/Sao/Zed/Sales/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/ProjectA/Zed/Sales/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/ProjectA/Zed/DwhOrderStatus/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/ProjectA/Zed/Behat/Module/navigation.xml',
);
