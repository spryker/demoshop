<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Shared_BundlePackageMapper
{

    private static $bundlePackageMap = array(
        'Acl' => 'acl-package',
        'AclDE' => 'acl-package',
        'Auth' => 'acl-package',
        'Adyen' => 'adyen-package',
        'Cart' => 'cart-package',
        'Catalog' => 'catalog-package',
        'Category' => 'catalog-package',
        'Feed' => 'catalog-package',
        'Image' => 'catalog-package',
        'Price' => 'catalog-package',
        'Stock' => 'catalog-package',
        'Checkout' => 'checkout-package',
        'Salesrule' => 'checkout-package',
        'PaymentControl' => 'checkout-package',
        'Cms' => 'content-package',
        'Customer' => 'crm-package',
        'Mail' => 'crm-package',
        'Newsletter' => 'crm-package',
        'Dwh' => 'dwh-package',
        'Em' => 'em-package',
        'Solr' => 'frontend-package',
        'Yves' => 'frontend-package',
        'Glossary' => 'glossary-package',
        'Setup' => 'infrastructure-package',
        'Application' => 'infrastructure-package',
        'Behat' => 'infrastructure-package',
        'Dbdump' => 'infrastructure-package',
        'Installer' => 'infrastructure-package',
        'Misc' => 'infrastructure-package',
        'System' => 'infrastructure-package',
        'Library' => 'library-package',
        'Lumberjack' => 'lumberjack-package',
        'Adwords' => 'marketing-package',
        'Mci' => 'marketing-package',
        'Mcm' => 'marketing-package',
        'Tracking' => 'marketing-package',
        'Payment' => 'payment-package',
        'Sales' => 'sales-package',
        'Calculation' => 'sales-package',
        'DwhOrderStatus' => 'sales-package',
        'DwhOrderStatusMapping' => 'sales-package',
        'Invoice' => 'sales-package',
        'Task' => 'sales-package',
        'Stripe' => 'stripe-package'
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

    /**
     * @return array
     */
    public static function getBundleList()
    {
        return array_unique(array_keys(self::$bundlePackageMap));
    }

    /**
     * @return array
     */
    public static function getPackageList()
    {
        return array_values(self::$bundlePackageMap);
    }

    /**
     * @return array
     */
    public static function getStoreFilteredBundleList()
    {
        $stores = \ProjectA_Shared_Library_Store::getInstance()->getAllowedStores();
        $filteredBundles = [];
        foreach (self::getBundleList() as $bundle) {
            $bundleStore = substr($bundle, -2);
            if (!in_array($bundleStore, $stores)) {
                $filteredBundles[] = $bundle;
            }
        }
        return $filteredBundles;
    }


}
