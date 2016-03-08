<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Yves\Application\Business\Model;

interface FlashMessengerInterface
{

    const FLASH_MESSAGES_SUCCESS = 'flash.messages.success';
    const FLASH_MESSAGES_ERROR= 'flash.messages.error';
    const FLASH_MESSAGES_INFO = 'flash.messages.info';

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addSuccessMessage($message);

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addInfoMessage($message);

    /**
     * @param string $message
     *
     * @throws \ErrorException
     *
     * @return $this
     */
    public function addErrorMessage($message);

}
