<?php

namespace Pyz\Yves\System\Communication\Controller;

use Pyz\Yves\System\Communication\SystemDependencyContainer;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method SystemDependencyContainer getDependencyContainer()
 */
class HeartbeatController extends AbstractController
{

    const SYSTEM_UP = 'UP';
    const SYSTEM_DOWN = 'DOWN';
    const SYSTEM_STATUS = 'status';
    const STATUS_REPORT = 'report';

    public function indexAction()
    {
        $ambulance = $this->getDependencyContainer()->createAmbulance();

        if ($ambulance->isSystemAlive()) {
            return $this->jsonResponse(
                [self::SYSTEM_STATUS => self::SYSTEM_UP],
                Response::HTTP_OK
            );
        } else {
            return $this->jsonResponse(
                [self::SYSTEM_STATUS => self::SYSTEM_DOWN, self::STATUS_REPORT => $ambulance->getReport()->toArray()],
                Response::HTTP_SERVICE_UNAVAILABLE
            );
        }
    }

}
