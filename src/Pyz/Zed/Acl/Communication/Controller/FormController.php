<?php

namespace Pyz\Zed\Acl\Communication\Controller;

use SprykerFeature\Zed\Acl\Communication\AclDependencyContainer;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AclDependencyContainer getDependencyContainer()
 */
class FormController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function userAction(Request $request)
    {
        $form = $this->getDependencyContainer()->createUserWithGroupForm(
            $request
        );

        $form->init();

        if ($form->isValid()) {
            $data = $form->getRequestData();

            $user = $this->getLocator()->user()->transferUser();
            $user->setFirstName($data['first_name']);
            $user->setLastName($data['last_name']);
            $user->setUsername($data['username']);
            $user->setPassword($data['password']);

            if (isset($data['id_user_user'])) {
                $user->setIdUserUser($data['id_user_user']);
                $user = $this->getLocator()
                    ->user()
                    ->facade()
                    ->updateUser($user);
            } else {
                $user = $this->getLocator()
                    ->user()
                    ->facade()
                    ->addUser($user->getFirstName(), $user->getLastName(), $user->getUsername(), $user->getPassword());
            }

            $this->getLocator()->acl()->facade()->addUserToGroup($user->getIdUserUser(), $data['id_acl_group']);
        }

        return $this->jsonResponse($form->renderData());
    }
}
