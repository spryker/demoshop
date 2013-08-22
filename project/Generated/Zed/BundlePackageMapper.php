<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_BundlePackageMapper
{

    private static $bundlePackageMap = array(
        'Acl' => 'acl-package',
        'AclDE' => 'acl-package',
        'Auth' => 'acl-package',
        'Adyen' => 'adyen-package',
        'Cart' => 'yves-package',
        'Catalog' => 'yves-package',
        'Category' => 'catalog-package',
        'Feed' => 'catalog-package',
        'Image' => 'catalog-package',
        'Price' => 'catalog-package',
        'Stock' => 'catalog-package',
        'Salesrule' => 'checkout-package',
        'Checkout' => 'checkout-package',
        'PaymentControl' => 'checkout-package',
        'Cms' => 'content-package',
        'Customer' => 'yves-package',
        'Mail' => 'crm-package',
        'Newsletter' => 'crm-package',
        'Dwh' => 'dwh-package',
        'Em' => 'em-package',
        'Solr' => 'frontend-package',
        'Yves' => 'frontend-package',
        'Glossary' => 'glossary-package',
        'Application' => 'infrastructure-package',
        'Behat' => 'infrastructure-package',
        'Dbdump' => 'infrastructure-package',
        'Installer' => 'infrastructure-package',
        'Misc' => 'infrastructure-package',
        'Setup' => 'infrastructure-package',
        'System' => 'infrastructure-package',
        'UI' => 'library-package',
        'Library' => 'library-package',
        'Lumberjack' => 'lumberjack-package',
        'Adwords' => 'marketing-package',
        'Mci' => 'marketing-package',
        'Mcm' => 'marketing-package',
        'Tracking' => 'yves-package',
        'Payment' => 'yves-package',
        'Sales' => 'sales-package',
        'Calculation' => 'sales-package',
        'DwhOrderStatus' => 'sales-package',
        'DwhOrderStatusMapping' => 'sales-package',
        'Invoice' => 'sales-package',
        'Task' => 'sales-package',
        'configuration-templates' => 'solr-package',
        'configuration-templates-meta' => 'solr-package',
        'Stripe' => 'stripe-package',
        'Country' => 'yves-package',
        'Error' => 'yves-package',
        'Interface' => 'yves-package',
        'Model' => 'yves-package',
        'Product' => 'yves-package',
        'Storage' => 'yves-package'
        );

    /**
     * @param mixed $bundle 
     * @return bool
     */
    public static function issetBundle($bundle)
    {
        return isset(self::$bundlePackageMap[$bundle]);
    }

    /**
     * @param mixed $bundle 
     * @return string
     */
    public static function getPackageNameByBundle($bundle)
    {
        return self::$bundlePackageMap[$bundle];
    }


}
