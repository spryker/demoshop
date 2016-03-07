<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Business\Model;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class FlashMessenger implements FlashMessengerInterface
{

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface
     */
    protected $flashBag;

    /**
     * FlashMessenger constructor.
     */
    public function __construct(FlashBagInterface $flashBag)
    {
        $this->flashBag = $flashBag;
    }

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addSuccessMessage($message)
    {
        $this->addToFlashBag(FlashMessengerInterface::FLASH_MESSAGES_SUCCESS, $message);

        return $this;
    }

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addInfoMessage($message)
    {
        $this->addToFlashBag(FlashMessengerInterface::FLASH_MESSAGES_INFO, $message);

        return $this;
    }

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addErrorMessage($message)
    {
        $this->addToFlashBag(FlashMessengerInterface::FLASH_MESSAGES_ERROR, $message);

        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    protected function addToFlashBag($key, $value)
    {
        $this->flashBag->add($key, $value);
    }

}
