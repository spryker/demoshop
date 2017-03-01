<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Newsletter\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Newsletter\Form\NewsletterSubscriptionForm;
use Pyz\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Newsletter\NewsletterFactory getFactory()
 * @method \Pyz\Client\Newsletter\NewsletterClientInterface getClient()
 */
class SubscriptionController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function subscribeAction(Request $request)
    {
        $success = false;
        $error = false;

        $subscriptionForm = $this
            ->getFactory()
            ->createNewsletterSubscriptionForm();

        $parentRequest = $this->getApplication()['request_stack']->getParentRequest();

        if ($parentRequest !== null) {
            $request = $parentRequest;
        }

        $subscriptionForm->handleRequest($request);

        if ($subscriptionForm->isValid()) {
            $customerTransfer = (new CustomerTransfer())
                ->setEmail($subscriptionForm->get(NewsletterSubscriptionForm::FIELD_SUBSCRIBE)->getData());

            $subscriptionResponse = $this
                ->getClient()
                ->subscribeForEditorialNewsletter($customerTransfer);

            if ($subscriptionResponse->getIsSuccess()) {
                $subscriptionForm = $this
                    ->getFactory()
                    ->createNewsletterSubscriptionForm();
                $success = 'newsletter.subscription.success';
            }

            if (!$subscriptionResponse->getIsSuccess()) {
                $error = $subscriptionResponse->getErrorMessage();
            }
        }

        return $this->viewResponse([
            'newsletterSubscriptionForm' => $subscriptionForm->createView(),
            'error' => $error,
            'success' => $success,
        ]);
    }

}
