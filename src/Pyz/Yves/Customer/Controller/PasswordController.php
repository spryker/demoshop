<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClient;
use Pyz\Yves\Customer\CustomerFactory;
use Pyz\Yves\Customer\Form\RestorePasswordForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Shared\Customer\Code\Messages;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClient getClient()
 */
class PasswordController extends AbstractCustomerController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function forgottenPasswordAction(Request $request)
    {
        $form = $this
            ->buildForm($this->getFactory()->createFormForgottenPassword())
            ->handleRequest($request);

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());

            $customerResponseTransfer = $this->sendPasswordRestoreMail($customerTransfer);

            if ($customerResponseTransfer->getIsSuccess()) {
                $this->addSuccessMessage(Messages::CUSTOMER_PASSWORD_RECOVERY_MAIL_SENT);
            } else {
                $this->processResponseErrors($customerResponseTransfer);
            }
        }

        return $this->viewResponse([
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function restorePasswordAction(Request $request)
    {
        $form = $this
            ->buildForm($this->getFactory()->createFormRestorePassword())
            ->setData([
                RestorePasswordForm::FIELD_RESTORE_PASSWORD_KEY => $request->query->get('token'),
            ])
            ->handleRequest($request);

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());

            $customerResponseTransfer = $this->getClient()->restorePassword($customerTransfer);

            if ($customerResponseTransfer->getIsSuccess()) {
                $this->getClient()->logout();

                $this->addSuccessMessage(Messages::CUSTOMER_PASSWORD_CHANGED);

                return $this->redirectResponseInternal(CustomerControllerProvider::ROUTE_LOGIN);
            }

            $this->processResponseErrors($customerResponseTransfer);
        }

        return $this->viewResponse([
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    protected function sendPasswordRestoreMail(CustomerTransfer $customerTransfer)
    {
        return $this->getClient()
            ->sendPasswordRestoreMail($customerTransfer);
    }

}
