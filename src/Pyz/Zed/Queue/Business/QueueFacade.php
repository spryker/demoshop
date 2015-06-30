<?php
namespace Pyz\Zed\Queue\Business;

use SprykerFeature\Zed\Queue\Business\QueueFacade as CoreQueueFacade;
use SprykerFeature\Zed\Distributor\Dependency\Facade\DistributorToQueueInterface;

class QueueFacade extends CoreQueueFacade implements
    DistributorToQueueInterface
{

}
