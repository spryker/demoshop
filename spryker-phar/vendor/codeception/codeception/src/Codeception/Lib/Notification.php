<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib;

class Notification
{

    protected static $messages = [];

    /**
     * @return void
     */
    public static function warning($message, $location)
    {
        self::$messages[] = 'WARNING: ' . self::formatMessage($message, $location);
    }

    /**
     * @return void
     */
    public static function deprecate($message, $location = '')
    {
        self::$messages[] = 'DEPRECATION: ' . self::formatMessage($message, $location);
    }

    private static function formatMessage($message, $location = '')
    {
        if ($location) {
            return "<bold>$message</bold> <info>$location</info>";
        }
        return $message;
    }

    public static function all()
    {
        $messages = self::$messages;
        self::$messages = [];
        return $messages;
    }

}
