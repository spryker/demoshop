<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;

class LandingpageController extends AbstractController
{
    /**
     * @param $subscriber_key
     * @return array
     */
    public function indexAction($subscriber_key)
    {
        $newsletterSubscriber = new NewsletterSubscriberTransfer();
        $newsletterSubscriber->setSubscriberKey($subscriber_key);
        $approvalResponse = $this->getLocator()->mailchimpNewsletter()->client()->approveDoubleOptInSubscriber($newsletterSubscriber);

        $approvalResponse->getErrorMessage();
        $approvalResponse = [
            'isSuccess' => $approvalResponse->getIsSuccess(),
            'errorMessage' => $approvalResponse->getErrorMessage()
        ];
        return ['approvalResponse' => $approvalResponse];
    }
}
