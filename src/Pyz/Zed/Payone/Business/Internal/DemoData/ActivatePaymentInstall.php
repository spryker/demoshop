<?php

namespace Pyz\Zed\Payone\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;

class ActivatePaymentInstall implements DemoDataInstallInterface
{

    /**
     * @param Console $console
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function install(Console $console)
    {
        $console->info('Activate payment(s)');
        if ($console->askConfirmation('Would you like to activate Prepayment?')) {
            /** @var \ProjectA\Zed\Payment\Persistence\Propel\PacPaymentConfig $entity */
            $entity = \ProjectA\Zed\Payment\Persistence\Propel\PacPaymentConfigQuery::create()
                ->findOneByName('Prepayment')
            ;

            if ($entity) {
                $entity->setIsActive(true);
                $entity->save();
            }
        }
    }
}
