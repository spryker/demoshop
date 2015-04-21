<?php

namespace Pyz\Zed\Acl\Communication\Controller;

use ProjectA\Zed\Application\Communication\Controller\AbstractController;
use Pyz\Zed\Acl\Communication\AclDependencyContainer;
use Symfony\Component\HttpFoundation\Request;

class UsersController extends AbstractController
{

    /**
     * @var AclDependencyContainer
     */
    protected $dependencyContainer;

    public function indexAction()
    {
    }

    public function listAction(Request $request)
    {
        $grid = $this->dependencyContainer->createUsersWithGroupGrid($request);

        return $this->jsonResponse($grid->toArray());
    }
}
