<?php
namespace Pyz\Yves\Customer\Module\Controller;

use Generated\Yves\Factory;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Customer\Module\Controller\SecurityController as ProjectASecurityController;
use Pyz\Yves\Application\Module\ControllerProvider;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use ProjectA\Yves\Library\Session\FlashMessageHelper;
use ProjectA\Yves\Customer\Module\Form\LoginType;
use ProjectA\Yves\Customer\Module\Form\RegistrationType;
use ProjectA\Yves\Customer\Module\Form\ForgotPasswordType;

class SecurityController extends ProjectASecurityController
{

    /**
     * @param Request $request
     * @return array|RedirectResponse
     */
    public function loginOrRegisterAction(Request $request)
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_REGISTRATION)
            ->buildTracking();

        if ($this->getApplication()['security']->isGranted('ROLE_USER')) {
            $this->getFlashMessageHelper()->addMessage(FlashMessageHelper::INFO, self::CUSTOMER_ALREADY_LOGGED_IN);
            return $this->redirectInternal('home');
        }

        $userMail = $this->checkSessionError($request);

        $loginForm = $this->getApplication()->createForm(new LoginType());
        if ($userMail) {
            $loginForm->add('username', 'email', array(
                'data' => $userMail
            ));
        }

        $registrationForm = $this->getApplication()->createForm(new RegistrationType());
        $forgotPasswordForm = $this->getApplication()->createForm(new ForgotPasswordType());

        $result = $this->validateRegistration($registrationForm);
        if ($result instanceof RedirectResponse) {
            return $result;
        }
        $result = $this->validateForgotPassword($forgotPasswordForm);
        if ($result instanceof RedirectResponse) {
            return $result;
        }

        return [
            'loginForm' => $loginForm->createView(),
            'registrationForm' => $registrationForm->createView(),
            'forgotPasswordForm' => $forgotPasswordForm->createView()
        ];
    }

    /**
     * @param FormInterface $registrationForm
     * @return RedirectResponse
     */
    protected function validateRegistration(FormInterface $registrationForm)
    {
        if ($registrationForm->isValid()) {
            $customerModel = Factory::getInstance()->createCustomerModelCustomer($this->getApplication());
            $result = $customerModel->register($registrationForm->getData());
            $this->getFlashMessageHelper()->addMessagesFromResponse($result);
            if ($result->isSuccess()) {
                Tracking::getInstance()->setValue('goal1', 'registration');
                return $this->handleSuccessfulRegistration();
            }
        }
    }

    /**
     * @return string
     */
    protected function getHomepageUrl()
    {
        return ControllerProvider::ROUTE_HOME;
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    protected function checkSessionError(Request $request)
    {
        $session = $request->getSession();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $loginError = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $loginError = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        if ($loginError) {
            $this->getFlashMessageHelper()->addMessage(FlashMessageHelper::ERROR, self::LOGIN_ERROR_BAD_CREDENTIALS);

            return $loginError->getToken()->getUser();
        }
    }
}
