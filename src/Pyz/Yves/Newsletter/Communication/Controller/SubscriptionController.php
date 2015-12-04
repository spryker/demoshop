<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\NewsletterSubscriberTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionRequestTransfer;
use Generated\Shared\Transfer\NewsletterTypeTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResponseTransfer;
use Generated\Shared\Transfer\NewsletterSubscriptionResultTransfer;
use Symfony\Component\HttpFoundation\JsonResponse;

class SubscriptionController extends AbstractController
{
    /**
     * @param Request $request
     * @return array|JsonResponse
     */
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

        $subscriptionsResults = [];

        if ($newsletterTypes->count() > 0) {
            $subscriptionRequest->setNewsletterSubscriber($subscriber);
            $subscriptionRequest->setNewsletterTypes($newsletterTypes);
            /** @var NewsletterSubscriptionResponseTransfer $transferResult */
            $transferResult = $this->locator->mailchimpNewsletter()->client()->subscribeWithDoubleOptIn($subscriptionRequest);

            /** @var NewsletterSubscriptionResultTransfer $subscriptionResult */
            foreach($transferResult->getSubscriptionResults() as $subscriptionResult)
            {
                $subscriptionResult = [
                    'name' => $subscriptionResult->getNewsletterType()->getName(),
                    'isSuccess' => $subscriptionResult->getIsSuccess(),
                    'errorMessage' => $subscriptionResult->getErrorMessage()
                ];
                $subscriptionsResults[] = $subscriptionResult;
            }
        }

        if($request->isXmlHttpRequest())
        {
            return new JsonResponse(['subscriptionsResults' => $subscriptionsResults]);
        }
        else
        {
            return ['subscriptionsResults' => $subscriptionsResults];
        }
    }
}
