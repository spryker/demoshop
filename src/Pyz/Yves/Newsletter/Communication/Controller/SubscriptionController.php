<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer;

class SubscriptionController extends AbstractController
{
    public function indexAction(Request $request)
    {
        $subscriptionRequest = new NewsletterSubscriptionRequestTransfer();

        $subscriber = new NewsletterSubscriberTransfer();
        $subscriber->setEmail($request->get('email'));

        $newsletterTypes = new \ArrayObject();
        if((bool)$request->get('NewsletterTypeDogs') === true) {
            $newsletterType = new NewsletterTypeTransfer();
            $newsletterType->setName('dogs');
            $newsletterTypes[] = $newsletterType;
        }

        if((bool)$request->get('NewsletterTypeCats') === true) {
            $newsletterType = new NewsletterTypeTransfer();
            $newsletterType->setName('cats');
            $newsletterTypes[] = $newsletterType;
        }

        $subscriptionRequest->setNewsletterSubscriber($subscriber);
        $subscriptionRequest->setNewsletterTypes($newsletterTypes);

        /** @var NewsletterSubscriptionResponseTransfer $transferResult */
        $transferResult = $this->locator->mailchimpNewsletter()->client()->subscribeWithDoubleOptIn($subscriptionRequest);

        /** @var NewsletterSubscriptionResultTransfer $subscriptionResult */
        $subscriptionsResults = [];
        foreach($transferResult->getSubscriptionResults() as $subscriptionResult)
        {
            $subscriptionResult = [
                'name' => $subscriptionResult->getNewsletterType()->getName(),
                'isSuccess' => $subscriptionResult->getIsSuccess(),
                'errorMessage' => $subscriptionResult->getErrorMessage()
            ];
            $subscriptionsResults[] = $subscriptionResult;
        }

        return ['subscriptionsResults' => $subscriptionsResults];
    }
}
