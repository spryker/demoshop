<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Lib\Interfaces;

interface MultiSession
{

    public function _initializeSession();

    public function _loadSession($session);

    public function _backupSession();

    public function _closeSession($session = null);

    public function _getName();

}
