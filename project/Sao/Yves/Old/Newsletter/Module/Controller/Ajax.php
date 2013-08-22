<?php

/**
 * Newsletter
 */

class Sao_Yves_Search_Module_Controller_Ajax extends Sao_Yves_Library_Base_Controller
{
    /**
     *
     */
    public function actionSubscribe()
    {
//        $newsletterForm = FormsFactory::getNewsletterForm();
//        $newsletterForm->populate($this->getParam('NewsletterForm'));
//
//        if ($newsletterForm->isValid()) {
//            $transferSubscription = Generated_Shared_Library_TransferLoader::getNewsletterSubscription();
//            $transferSubscription->setEmail($newsletterForm->getElement('emailaddress')->getValue());
//
//            $request = Factory::getYlZedRequest();
//            $transferSubscription->setIsRegistrationCoupon(true);
//            $res = $request->request('newsletter/yves/newsletter-subscribe', $transferSubscription, 2, 10);
//            if ($res instanceof Sao_Shared_Application_Transfer_Response && $res->getSuccess()) {
//                $response['success'] = t(L::NEWSLETTER_SUBSCRIBE_SUCCESS);
//            } else {
//                $response['error'] = t(L::NEWSLETTER_SUBSCRIBE_ERROR);
//            }
//
//        } else {
//            $response['error'] = t(L::NEWSLETTER_SUBSCRIBE_ERROR);
//        }
//
//        echo CJSON::encode($response);
    }
}