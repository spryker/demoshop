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
    APPLICATION_VENDOR_DIR . '/project-a/acl-package/src/ProjectA/Zed/Acl/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/checkout-package/src/ProjectA/Zed/Salesrule/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/content-package/src/ProjectA/Zed/Cms/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/src/ProjectA/Zed/Customer/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/crm-package/src/ProjectA/Zed/Mail/Module/navigation.xml',
    APPLICATION_PROJECT . '/Sao/Zed/Mail/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/dwh-package/src/ProjectA/Zed/Dwh/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/frontend-package/src/ProjectA/Zed/Yves/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/glossary-package/src/ProjectA/Zed/Glossary/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/src/ProjectA/Zed/Lumberjack/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/src/ProjectA/Zed/Setup/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/src/ProjectA/Zed/System/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/src/ProjectA/Zed/Mcm/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/marketing-package/src/ProjectA/Zed/Adwords/Module/navigation.xml',
    APPLICATION_PROJECT . '/Sao/Zed/Sales/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/src/ProjectA/Zed/Sales/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/sales-package/src/ProjectA/Zed/DwhOrderStatus/Module/navigation.xml',
    APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/src/ProjectA/Zed/Behat/Module/navigation.xml',
);
