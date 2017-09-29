<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Connector\Yii2;

use Codeception\Util\Debug;
use yii\base\Exception;
use yii\helpers\VarDumper;
use yii\log\Logger as yiiLogger;

class Logger extends yiiLogger
{

    /**
     * @return void
     */
    public function init()
    {
        // overridden to prevent register_shutdown_function
    }

    /**
     * @return void
     */
    public function log($message, $level, $category = 'application')
    {
        if (!in_array($level, [
            yiiLogger::LEVEL_INFO,
            yiiLogger::LEVEL_WARNING,
            yiiLogger::LEVEL_ERROR,
        ])) {
            return;
        }
        if (strpos($category, 'yii\db\Command') === 0) {
            return; // don't log queries
        }

        // https://github.com/Codeception/Codeception/issues/3696
        if ($message instanceof Exception) {
            $message = $message->__toString();
        }

        Debug::debug("[$category] " . VarDumper::export($message));
    }

}
