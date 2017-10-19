<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\NewsletterSubscriptionForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 */
class NewsletterController extends AbstractCustomerController
{
    const MESSAGE_UNSUBSCRIPTION_SUCCESS = 'newsletter.unsubscription.success';
    const MESSAGE_UNSUBSCRIPTION_FAILED = 'newsletter.unsubscription.failed';
    const MESSAGE_SUBSCRIPTION_CONFIRMATION_APPROVED = 'newsletter.subscription.confirmation.approved';
    const MESSAGE_SUBSCRIPTION_FAILED = 'newsletter.subscription.failed';
    const MESSAGE_SUBSCRIPTION_SUCCESS = 'newsletter.subscription.success';

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $newsletterForm = $this
            ->getFactory()
            ->createCustomerFormFactory()
            ->createNewsletterSubscriptionForm()
            ->handleRequest($request);

        if ($newsletterForm->isSubmitted() === false) {
            $newsletterForm->setData($this->getFormData($customerTransfer));
        }

        if ($newsletterForm->isValid()) {
            $subscribe = (bool)$newsletterForm->get(NewsletterSubscriptionForm::FIELD_SUBSCRIBE)->getData();
            $this->processSubscriptionForm($subscribe, $customerTransfer);

            return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEWSLETTER);
        }

        return $this->viewResponse([
            'customer' => $customerTransfer,
            'form' => $newsletterForm->createView(),
        ]);
    }

    /**
     * @param bool $subscribe
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processSubscriptionForm($subscribe, CustomerTransfer $customerTransfer)
    {
        if ($subscribe === true) {
            $this->processSubscription($customerTransfer);

            return;
        }

        $this->processUnsubscription($customerTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processSubscription(CustomerTransfer $customerTransfer)
    {
        $subscriptionResult = $this->getFactory()
            ->getNewsletterClient()
            ->subscribeForEditorialNewsletter($customerTransfer);

        if ($subscriptionResult->getIsSuccess()) {
            $this->addSuccessMessage(self::MESSAGE_SUBSCRIPTION_SUCCESS);

            return;
        }

        $this->addErrorMessage($subscriptionResult->getErrorMessage());
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processUnsubscription(CustomerTransfer $customerTransfer)
    {
        $this->getFactory()
            ->getNewsletterClient()
            ->unsubscribeFromAllNewsletters($customerTransfer);

        $this->addSuccessMessage(self::MESSAGE_UNSUBSCRIPTION_SUCCESS);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getFormData(CustomerTransfer $customerTransfer)
    {
        $subscriptionResultTransfer = $this->getFactory()
            ->getNewsletterClient()
            ->checkEditorialNewsletterSubscription($customerTransfer);

        return [
            NewsletterSubscriptionForm::FIELD_SUBSCRIBE => $subscriptionResultTransfer->getIsSuccess(),
        ];
    }
}
