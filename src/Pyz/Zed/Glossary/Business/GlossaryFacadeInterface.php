<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Glossary\Business;

use Spryker\Zed\Glossary\Business\GlossaryFacadeInterface as SprykerGlossaryFacadeInterface;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;

interface GlossaryFacadeInterface extends SprykerGlossaryFacadeInterface
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return void
     */
    public function installDemoData(MessengerInterface $messenger);

}
