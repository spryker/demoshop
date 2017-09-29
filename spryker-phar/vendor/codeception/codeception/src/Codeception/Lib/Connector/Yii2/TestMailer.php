<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector\Yii2;

use yii\mail\BaseMailer;

class TestMailer extends BaseMailer
{

    public $messageClass = 'yii\swiftmailer\Message';

    private $sentMessages = [];

    protected function sendMessage($message)
    {
        $this->sentMessages[] = $message;
        return true;
    }

    protected function saveMessage($message)
    {
        return $this->sendMessage($message);
    }

    public function getSentMessages()
    {
        return $this->sentMessages;
    }

    /**
     * @return void
     */
    public function reset()
    {
        $this->sentMessages = [];
    }

}
