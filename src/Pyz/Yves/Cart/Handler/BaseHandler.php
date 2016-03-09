<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Handler;

use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Kernel\AbstractClient;

class BaseHandler
{

    /**
     * @var \Pyz\Yves\Application\Business\Model\FlashMessengerInterface
     */
    protected $flashMessenger;

    /**
     * @param \Pyz\Yves\Application\Business\Model\FlashMessengerInterface $flashMessenger
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
