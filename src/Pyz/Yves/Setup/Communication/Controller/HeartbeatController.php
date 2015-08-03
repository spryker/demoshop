<?php

namespace Pyz\Yves\Setup\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;

class HeartbeatController extends AbstractController
{

    /**
     * @return mixed
     */
    public function indexAction()
    {
        return $this->getLocator()->setup()->client()->getHeartbeatResponse();
    }

}
