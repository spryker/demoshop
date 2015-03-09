<?php

namespace Pyz\Yves\Newsletter\Communication\Controller;

use ProjectA\Yves\Newsletter\Communication\Form\SubscriptionType;
use ProjectA\Shared\Library\Communication\Response;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Yves\Newsletter\Communication\Plugin\NewsletterControllerProvider;
use SprykerFeature\Sdk\Newsletter\NewsletterSdk;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NewsletterController
 * @package ProjectA\Yves\Newsletter\Communication\Controller
 */
class NewsletterController extends AbstractController
{

    const NEWSLETTER_SUBSCRIPTION_CONFIRMATION_KEY_MISSING = 'newsletter.subscription.confirmation.key.missing';
    const PARAMETER_SUBSCRIPTION_CONFIRMATION_KEY = 'key';
    const PARAMETER_SUBSCRIPTION_CANCELLATION_KEY = 'key';
    const PARAMETER_SUBSCRIPTION_EMAIL = 'email';
    const CONFIRMATION_KEY = 'confirmationKey';
    const CANCELLATION_KEY = 'unsubscriptionKey';

    /**
     * @param Request $request
     * @return array|string
     */
    public function subscribeAction(Request $request)
    {
        if ($request->request->has(self::PARAMETER_SUBSCRIPTION_EMAIL)) {
            $subscriptionTransfer = $this->locator->newsletter()->transferSubscription(
                [self::PARAMETER_SUBSCRIPTION_EMAIL => $request->request->get(self::PARAMETER_SUBSCRIPTION_EMAIL)]
            );
            $response = $this->getNewsletterSdk()->create($subscriptionTransfer);

            return $this->handleResponse($response);
        }

        $subscriptionForm = $this->createForm(new SubscriptionType());
        if ($subscriptionForm->isValid()) {
            $response = $this->getNewsletterSdk()->create($subscriptionForm->getData());

            return $this->handleResponse($response);
        }

        return ['subscriptionForm' => $subscriptionForm->createView()];
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function confirmSubscriptionAction(Request $request)
    {
        if ($request->request->has(self::PARAMETER_SUBSCRIPTION_CONFIRMATION_KEY)) {
            $subscriptionTransfer = $this->locator->newsletter()->transferSubscription(
                [self::CONFIRMATION_KEY => $request->request->get(self::PARAMETER_SUBSCRIPTION_CONFIRMATION_KEY)]
            );
            $response = $this->getNewsletterSdk()->confirm($subscriptionTransfer);

            return $this->handleResponse($response);
        }

        if ($request->query->has(self::PARAMETER_SUBSCRIPTION_CONFIRMATION_KEY)) {
            $subscriptionTransfer = $this->locator->newsletter()->transferSubscription(
                [self::CONFIRMATION_KEY => $request->query->get(self::PARAMETER_SUBSCRIPTION_CONFIRMATION_KEY)]
            );
            $response = $this->getNewsletterSdk()->confirm($subscriptionTransfer);

            $this->addMessagesFromZedResponse($response);

            if (!$response->isSuccess()) {
                return $this->redirectResponseInternal(NewsletterControllerProvider::ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_FAILURE);
            }
        } else {
            $this->addMessageError(
                self::NEWSLETTER_SUBSCRIPTION_CONFIRMATION_KEY_MISSING
            );
        }

        return $this->redirectResponseInternal(NewsletterControllerProvider::ROUTE_NEWSLETTER_CONFIRM_SUBSCRIPTION_SUCCESS);
    }

    public function subscriptionConfirmedAction()
    {
        return [];
    }

    public function subscriptionNotConfirmedAction()
    {
        return [];
    }

    /**
     * @param Request $request
     * @return array|string|RedirectResponse
     */
    public function unsubscribeAction(Request $request)
    {
        if ($request->request->has(self::PARAMETER_SUBSCRIPTION_CANCELLATION_KEY)) {
            $subscriptionTransfer = (new \ProjectA\Shared\Kernel\TransferLocator())->locateNewsletterSubscription(
                [self::CANCELLATION_KEY => $request->request->get(self::PARAMETER_SUBSCRIPTION_CANCELLATION_KEY)]
            );
            $response = $this->getNewsletterSdk()->cancel($subscriptionTransfer);

            return $this->handleResponse($response);

        }

        if ($request->query->has(self::PARAMETER_SUBSCRIPTION_CANCELLATION_KEY)) {
            $subscriptionTransfer = (new \ProjectA\Shared\Kernel\TransferLocator())->locateNewsletterSubscription(
                [self::CANCELLATION_KEY => $request->query->get(self::PARAMETER_SUBSCRIPTION_CANCELLATION_KEY)]
            );
            $response = $this->getNewsletterSdk()->cancel($subscriptionTransfer);

            $this->addMessagesFromZedResponse($response);

            if (!$response->isSuccess()) {
                return $this->redirectResponseInternal(NewsletterControllerProvider::ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_FAILURE);
            }

            return $this->redirectResponseInternal(NewsletterControllerProvider::ROUTE_NEWSLETTER_CANCEL_SUBSCRIPTION_SUCCESS);
        }

        $cancellationForm = $this->createForm(new SubscriptionType());
        if ($cancellationForm->isValid()) {
            $response = $this->getNewsletterSdk()->cancel($cancellationForm->getData());

            return $this->handleResponse($response);
        }

        return ['cancellationForm' => $cancellationForm->createView()];
    }

    public function subscriptionCancelledAction(Request $request)
    {
        return [];
    }

    public function subscriptionNotCancelledAction()
    {
        return [];
    }

    /**
     * @param Response $response
     * @return string
     */
    protected function handleResponse(\ProjectA\Shared\Library\Communication\Response $response)
    {
        $isSuccess = $response->isSuccess();
        $responseMessage = '';
        $responseMessageParameters = [];
        $messages = $isSuccess ? $response->getMessages() : $response->getErrorMessages();
        foreach ($messages as $message) {
            $responseMessage .= $message->getMessage();
            foreach ($message->getData() as $parameterKey => $parameterValue) {
                $responseMessageParameters[$parameterKey] = $parameterValue;
            }
        }

        return json_encode(
            [
                'level' => $isSuccess ? 'success' : 'error',
                'message' => $this->getTranslator()->trans($responseMessage, $responseMessageParameters),
            ]
        );
    }

    /**
     * @return NewsletterSdk
     */
    protected function getNewsletterSdk()
    {
        return $this->locator->newsletter()->sdk();
    }
}
