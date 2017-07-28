<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\RestorePasswordForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerControllerProvider;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Config\Config;
use Spryker\Shared\Customer\Code\Messages;
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
            ->getFactory()
            ->createCustomerFormFactory()
            ->createForgottenPasswordForm()
            ->handleRequest($request);

        if ($form->isValid()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->fromArray($form->getData());
            $customerTransfer->setRestorePasswordLink(
                $this->getApplication()->url('password/restore', ['token' => 'token-placeholder'])
            );

            $customerResponseTransfer = $this->sendPasswordRestoreMail($customerTransfer);
            $this->processResponseErrors($customerResponseTransfer);

            if ($customerResponseTransfer->getIsSuccess()) {
                $this->addSuccessMessage(Messages::CUSTOMER_PASSWORD_RECOVERY_MAIL_SENT);
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
            ->getFactory()
            ->createCustomerFormFactory()
            ->createFormRestorePassword()
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
