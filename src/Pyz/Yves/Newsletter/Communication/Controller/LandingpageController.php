<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;

class LandingpageController extends AbstractController
{
    /**
     * double opt-in landing page
     *
     * @param $subscriberKey
     * @return array
     */
    public function indexAction($subscriberKey)
    {
        $newsletterSubscriber = new NewsletterSubscriberTransfer();
        $newsletterSubscriber->setSubscriberKey($subscriberKey);
        $approvalResponse = $this->getLocator()->mailchimpNewsletter()->client()->approveDoubleOptInSubscriber($newsletterSubscriber);

        $approvalResponse = [
            'isSuccess' => $approvalResponse->getIsSuccess(),
            'errorMessage' => $approvalResponse->getErrorMessage()
        ];
        return ['approvalResponse' => $approvalResponse];
    }
}
