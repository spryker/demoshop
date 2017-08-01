<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Discount\Handler;

use Spryker\Client\Kernel\AbstractClient;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

class BaseHandler
{

    /**
     * @var \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
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
        foreach ($client->getZedStub()->getErrorMessages() as $errorMessage) {
            $this->flashMessenger->addErrorMessage($errorMessage->getValue());
        }

        foreach ($client->getZedStub()->getSuccessMessages() as $successMessage) {
            $this->flashMessenger->addSuccessMessage($successMessage->getValue());
        }

        foreach ($client->getZedStub()->getInfoMessages() as $infoMessage) {
            $this->flashMessenger->addInfoMessage($infoMessage->getValue());
        }
    }

}
