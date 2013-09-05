<?php

class Sao_Zed_Newsletter_Module_Controller_Cronjob extends ProjectA_Zed_Library_Controller_Cronjob
implements ProjectA_Zed_Newsletter_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Newsletter_Component_Dependency_Facade_Trait;
    /**
     * Deactivates Newsletter Subscription Old Coupons
     */
    public function deactivateoldcouponsAction()
    {
        /* @var $facade Nu3_Newsletter_Facade */
        $facade = $this->facadeNewsletter;
        $facade->deactivateNewsletterSubscriptionOldCoupons();

        $this->setReturnCode(ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }

}