<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use Spryker\Client\Kernel\AbstractClient;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

class BaseHandler
{

    /**
     * @var \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     */
    public function __construct(FlashMessengerInterface $flashMessenger)
    {
        $this->flashMessenger = $flashMessenger;
    }

    /**
     * @param \Spryker\Client\Kernel\AbstractClient $client
     *
     * @return void
     */
    public function setFlashMessagesFromLastZedRequest(AbstractClient $client)
    {
        foreach ($client->getZedErrorMessages() as $errorMessage) {
            $this->flashMessenger->addErrorMessage($errorMessage->getMessage());
        }

        foreach ($client->getZedSuccessMessages() as $successMessage) {
            $this->flashMessenger->addSuccessMessage($successMessage->getMessage());
        }

        foreach ($client->getZedInfoMessages() as $infoMessage) {
            $this->flashMessenger->addInfoMessage($infoMessage->getMessage());
        }
    }

}
