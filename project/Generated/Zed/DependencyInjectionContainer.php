<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_DependencyInjectionContainer
{

    /**
     * @param $model
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function doInjection($model, ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory = null)
    {
        if ($factory && $model instanceof ProjectA_Zed_Library_Dependency_Factory_Interface) {
            $model->setFactory($factory);
        }
        if ($factory && $model instanceof ProjectA_Zed_Library_Dependency_Config_Interface) {
            $model->setConfig($factory->getFacade()->getConfig());
        }
        if ($model instanceof ProjectA_Zed_Acl_Component_Dependency_Facade_Interface) {
            $model->setFacadeAcl((new Generated_Zed_Acl_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Adwords_Component_Dependency_Facade_Interface) {
            $model->setFacadeAdwords((new Generated_Zed_Adwords_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Adyen_Component_Dependency_Facade_Interface) {
            $model->setFacadeAdyen((new Generated_Zed_Adyen_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Auth_Component_Dependency_Facade_Interface) {
            $model->setFacadeAuth((new Generated_Zed_Auth_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_Aws_Component_Dependency_Facade_Interface) {
            $model->setFacadeAws((new Generated_Zed_Aws_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Behat_Component_Dependency_Facade_Interface) {
            $model->setFacadeBehat((new Generated_Zed_Behat_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Calculation_Component_Dependency_Facade_Interface) {
            $model->setFacadeCalculation((new Generated_Zed_Calculation_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Cart_Component_Dependency_Facade_Interface) {
            $model->setFacadeCart((new Generated_Zed_Cart_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface) {
            $model->setFacadeCatalog((new Generated_Zed_Catalog_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Category_Component_Dependency_Facade_Interface) {
            $model->setFacadeCategory((new Generated_Zed_Category_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Checkout_Component_Dependency_Facade_Interface) {
            $model->setFacadeCheckout((new Generated_Zed_Checkout_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Cms_Component_Dependency_Facade_Interface) {
            $model->setFacadeCms((new Generated_Zed_Cms_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Customer_Component_Dependency_Facade_Interface) {
            $model->setFacadeCustomer((new Generated_Zed_Customer_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Dbdump_Component_Dependency_Facade_Interface) {
            $model->setFacadeDbdump((new Generated_Zed_Dbdump_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Dwh_Component_Dependency_Facade_Interface) {
            $model->setFacadeDwh((new Generated_Zed_Dwh_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_DwhOrderStatusMapping_Component_Dependency_Facade_Interface) {
            $model->setFacadeDwhOrderStatusMapping((new Generated_Zed_DwhOrderStatusMapping_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Em_Component_Dependency_Facade_Interface) {
            $model->setFacadeEm((new Generated_Zed_Em_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Feed_Component_Dependency_Facade_Interface) {
            $model->setFacadeFeed((new Generated_Zed_Feed_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface) {
            $model->setFacadeFulfillment((new Generated_Zed_Fulfillment_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Glossary_Component_Dependency_Facade_Interface) {
            $model->setFacadeGlossary((new Generated_Zed_Glossary_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Image_Component_Dependency_Facade_Interface) {
            $model->setFacadeImage((new Generated_Zed_Image_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Installer_Component_Dependency_Facade_Interface) {
            $model->setFacadeInstaller((new Generated_Zed_Installer_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_Legacy_Component_Dependency_Facade_Interface) {
            $model->setFacadeLegacy((new Generated_Zed_Legacy_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Lumberjack_Component_Dependency_Facade_Interface) {
            $model->setFacadeLumberjack((new Generated_Zed_Lumberjack_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Mail_Component_Dependency_Facade_Interface) {
            $model->setFacadeMail((new Generated_Zed_Mail_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Mcm_Component_Dependency_Facade_Interface) {
            $model->setFacadeMcm((new Generated_Zed_Mcm_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Misc_Component_Dependency_Facade_Interface) {
            $model->setFacadeMisc((new Generated_Zed_Misc_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Newsletter_Component_Dependency_Facade_Interface) {
            $model->setFacadeNewsletter((new Generated_Zed_Newsletter_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Payment_Component_Dependency_Facade_Interface) {
            $model->setFacadePayment((new Generated_Zed_Payment_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_PaymentControl_Component_Dependency_Facade_Interface) {
            $model->setFacadePaymentControl((new Generated_Zed_PaymentControl_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_Pdf_Component_Dependency_Facade_Interface) {
            $model->setFacadePdf((new Generated_Zed_Pdf_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_Print_Component_Dependency_Facade_Interface) {
            $model->setFacadePrint((new Generated_Zed_Print_Component_Factory())->getFacade());
        }
        if ($model instanceof Sao_Zed_ProductImage_Component_Dependency_Facade_Interface) {
            $model->setFacadeProductImage((new Generated_Zed_ProductImage_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Sales_Component_Dependency_Facade_Interface) {
            $model->setFacadeSales((new Generated_Zed_Sales_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Salesrule_Component_Dependency_Facade_Interface) {
            $model->setFacadeSalesrule((new Generated_Zed_Salesrule_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Setup_Component_Dependency_Facade_Interface) {
            $model->setFacadeSetup((new Generated_Zed_Setup_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Solr_Component_Dependency_Facade_Interface) {
            $model->setFacadeSolr((new Generated_Zed_Solr_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_System_Component_Dependency_Facade_Interface) {
            $model->setFacadeSystem((new Generated_Zed_System_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Task_Component_Dependency_Facade_Interface) {
            $model->setFacadeTask((new Generated_Zed_Task_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Yves_Component_Dependency_Facade_Interface) {
            $model->setFacadeYves((new Generated_Zed_Yves_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Price_Component_Dependency_Facade_Interface) {
            $model->setFacadePrice((new Generated_Zed_Price_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Stock_Component_Dependency_Facade_Interface) {
            $model->setFacadeStock((new Generated_Zed_Stock_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Mci_Component_Dependency_Facade_Interface) {
            $model->setFacadeMci((new Generated_Zed_Mci_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Tracking_Component_Dependency_Facade_Interface) {
            $model->setFacadeTracking((new Generated_Zed_Tracking_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Invoice_Component_Dependency_Facade_Interface) {
            $model->setFacadeInvoice((new Generated_Zed_Invoice_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Stripe_Component_Dependency_Facade_Interface) {
            $model->setFacadeStripe((new Generated_Zed_Stripe_Component_Factory())->getFacade());
        }
        if ($model instanceof ProjectA_Zed_Library_Dependency_InitInterface) {
            $model->initAfterDependencyInjection();
        }
    }


}
