<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;

class UnsubscriptionController extends AbstractController
{

    public function indexAction($subscriberKey, $newsletterTypeName)
    {
        $newsletterSubscriber = new NewsletterSubscriberTransfer();
        $newsletterSubscriber->setSubscriberKey($subscriberKey);

        $newsletterType = new NewsletterTypeTransfer();
        $newsletterType->setName($newsletterTypeName);

        $newsletterSubscription = new NewsletterSubscriptionRequestTransfer();
        $newsletterSubscription->addSubscriptionType($newsletterType);
        $newsletterSubscription->setNewsletterSubscriber($newsletterSubscriber);

        $unsubscriptionResponse = $this->getLocator()->mailchimpNewsletter()->client()->unsubscribe($newsletterSubscription);

        $unSubscriptionResults = [];

        foreach($unsubscriptionResponse->getSubscriptionResults() as $unsubscriptionResponseResult)
        {
            $unSubscriptionResult = [
                'name' => $unsubscriptionResponseResult->getNewsletterType()->getName(),
                'isSuccess' => $unsubscriptionResponseResult->getIsSuccess(),
                'errorMessage' => $unsubscriptionResponseResult->getErrorMessage()
            ];
            $unSubscriptionResults[] = $unSubscriptionResult;
        }

        return ['unsubscriptionResults' => $unSubscriptionResults];
    }
}
