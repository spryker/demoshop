<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Heartbeat\Controller;

use Pyz\Yves\Application\Controller\AbstractController;
use Spryker\Shared\Storage\StorageConstants;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method \Pyz\Yves\Heartbeat\HeartbeatFactory getFactory()
 */
class HeartbeatController extends AbstractController
{
    public const SYSTEM_UP = 'UP';
    public const SYSTEM_DOWN = 'DOWN';
    public const SYSTEM_STATUS = 'status';
    public const STATUS_REPORT = 'report';
    public const STORAGE_CACHE_STRATEGY = StorageConstants::STORAGE_CACHE_STRATEGY_INACTIVE;

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction()
    {
        $healthChecker = $this
            ->getFactory()
            ->createHealthChecker()
            ->doHealthCheck();

        if ($healthChecker->isSystemAlive()) {
            return $this->jsonResponse(
                [
                    self::SYSTEM_STATUS => self::SYSTEM_UP,
                ],
                Response::HTTP_OK
            );
        }

        return $this->jsonResponse(
            [
                self::SYSTEM_STATUS => self::SYSTEM_DOWN,
                self::STATUS_REPORT => $healthChecker->getReport()->toArray(),
            ],
            Response::HTTP_SERVICE_UNAVAILABLE
        );
    }
}
