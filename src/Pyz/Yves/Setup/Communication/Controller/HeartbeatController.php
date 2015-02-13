<?php

namespace Pyz\Yves\Setup\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;

/**
 * Class HeartbeatController
 * @package Pyz\Yves\Setup\Communication\Controller
 */
class HeartbeatController extends \SprykerCore\Yves\Application\Communication\Controller\AbstractController
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
