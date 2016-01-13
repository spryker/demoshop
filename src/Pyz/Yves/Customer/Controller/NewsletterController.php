<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\CustomerFactory;
use Pyz\Yves\Customer\Form\NewsletterSubscriptionForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method CustomerFactory getFactory()
 */
class NewsletterController extends AbstractCustomerController
{

    const MESSAGE_UNSUBSCRIPTION_SUCCESS = 'newsletter.unsubscription.success';
    const MESSAGE_UNSUBSCRIPTION_FAILED = 'newsletter.unsubscription.failed';
    const MESSAGE_SUBSCRIPTION_CONFIRMATION_APPROVED = 'newsletter.subscription.confirmation.approved';
    const MESSAGE_SUBSCRIPTION_FAILED = 'newsletter.subscription.failed';
    const MESSAGE_SUBSCRIPTION_SUCCESS = 'newsletter.subscription.success';

    /**
     * @return array|RedirectResponse
     */
    public function indexAction()
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $newsletterFormType = $this
            ->getFactory()
            ->createFormNewsletterSubscription();

        $newsletterForm = $this
            ->buildForm($newsletterFormType);

        $newsletterForm->setData($this->getFormData($customerTransfer));

        return $this->viewResponse([
            'customer' => $customerTransfer,
            'form' => $newsletterForm->createView(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function submitFormAction(Request $request)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $newsletterFormType = $this
            ->getFactory()
            ->createFormNewsletterSubscription();

        $newsletterForm = $this
            ->buildForm($newsletterFormType)
            ->handleRequest($request);

        if ($newsletterForm->isValid()) {
            $subscribe = (bool) $newsletterForm->get(NewsletterSubscriptionForm::FIELD_SUBSCRIBE)->getData();
            $this->processSubscriptionForm($subscribe, $customerTransfer);
        }

        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_CUSTOMER_NEWSLETTER);
    }

    /**
     * @param bool $subscribe
     * @param CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processSubscriptionForm($subscribe, CustomerTransfer $customerTransfer)
    {
        if ($subscribe === true) {
            $this->processSubscription($customerTransfer);
        } else {
            $this->processUnsubscription($customerTransfer);
        }
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processSubscription(CustomerTransfer $customerTransfer)
    {
        $subscriptionResult = $this->getFactory()
            ->createNewsletterClient()
            ->subscribeForEditorialNewsletter($customerTransfer);

        if ($subscriptionResult->getIsSuccess()) {
            $this->addSuccessMessage(self::MESSAGE_SUBSCRIPTION_SUCCESS);
        } else {
            $this->addErrorMessage($subscriptionResult->getErrorMessage());
        }
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function processUnsubscription(CustomerTransfer $customerTransfer)
    {
        $this->getFactory()
            ->createNewsletterClient()
            ->unsubscribeFromAllNewsletters($customerTransfer);

        $this->addSuccessMessage(self::MESSAGE_UNSUBSCRIPTION_SUCCESS);
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return array
     */
    protected function getFormData(CustomerTransfer $customerTransfer)
    {
        $subscriptionResultTransfer = $this->getFactory()
            ->createNewsletterClient()
            ->checkEditorialNewsletterSubscription($customerTransfer);

        return [
            NewsletterSubscriptionForm::FIELD_SUBSCRIBE => $subscriptionResultTransfer->getIsSuccess(),
        ];
    }

}
