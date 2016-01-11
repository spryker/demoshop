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

//    const PARAM_TOKEN = 'token';

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

//    /**
//     * @return RedirectResponse
//     */
//    public function subscribeAction()
//    {
//        $form = $this->createForm($this->getDependencyContainer()->createFooterFormNewsletterSubscription());
//
//        if ($form->isValid()) {
//            $customerTransfer = new CustomerTransfer();
//            $customerTransfer->setEmail($form->get(FooterNewsletterSubscription::SUBSCRIBER_EMAIL)->getData());
//
//            $subscriptionResult = $this->getDependencyContainer()
//                ->createNewsletterClient()
//                ->subscribeForEditorialNewsletter($customerTransfer);
//
//            if ($subscriptionResult->getIsSuccess()) {
//                $this->addSuccessMessage(self::MESSAGE_SUBSCRIPTION_SUCCESS);
//            } else {
//                $this->addSuccessMessage($subscriptionResult->getErrorMessage());
//            }
//        } else {
//            $this->addSuccessMessage(self::MESSAGE_SUBSCRIPTION_FAILED);
//        }
//
//        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
//    }

//    /**
//     * @param Request $request
//     *
//     * @return RedirectResponse
//     */
//    public function approveAction(Request $request)
//    {
//        $token = $request->query->get(self::PARAM_TOKEN);
//
//        $subscriber = new NewsletterSubscriberTransfer();
//        $subscriber->setSubscriberKey($token);
//
//        $response = $this->getDependencyContainer()
//            ->createNewsletterClient()
//            ->approveDoubleOptInSubscriber($subscriber);
//
//        if ($response->getIsSuccess()) {
//            $this->addSuccessMessage(self::MESSAGE_SUBSCRIPTION_CONFIRMATION_APPROVED);
//        } else {
//            $this->addErrorMessage($response->getErrorMessage());
//        }
//
//        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
//    }

//    /**
//     * @param Request $request
//     *
//     * @return RedirectResponse
//     */
//    public function unsubscribeAction(Request $request)
//    {
//        $token = $request->query->get(self::PARAM_TOKEN);
//
//        $unsubscriptionResponse = $this->getDependencyContainer()
//            ->createNewsletterClient()
//            ->unsubscribeFromAllNewsletters(new CustomerTransfer(), $token);
//
//        $isSuccess = false;
//        foreach ($unsubscriptionResponse->getSubscriptionResults() as $unsubscriptionResult) {
//            $isSuccess = ($unsubscriptionResult->getIsSuccess() || $isSuccess);
//        }
//
//        if ($isSuccess) {
//            $this->addSuccessMessage(self::MESSAGE_UNSUBSCRIPTION_SUCCESS);
//        } else {
//            $this->addErrorMessage(self::MESSAGE_UNSUBSCRIPTION_FAILED);
//        }
//
//        return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_HOME);
//    }

}
