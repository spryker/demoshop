<?php

namespace Pyz\Yves\Setup\Communication\Controller;

use ProjectA\Yves\Application\Communication\Controller\AbstractController;

/**
 * Class HeartbeatController
 * @package Pyz\Yves\Setup\Communication\Controller
 */
class HeartbeatController extends AbstractController
{

    /**
     * @return mixed
     */
    public function indexAction()
    {
        $this->disableLoggingToNewRelic();

        return $this->locator->setup()->sdk()->getHeartbeatResponse();
    }
}
