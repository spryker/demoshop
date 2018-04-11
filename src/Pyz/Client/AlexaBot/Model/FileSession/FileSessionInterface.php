<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\FileSession;

interface FileSessionInterface
{
    /**
     * @param string $sessionName
     * @param string $data
     *
     * @return void
     */
    public function write($sessionName, $data);

    /**
     * @param $sessionName
     *
     * @return string
     */
    public function read($sessionName);

    /**
     * @param string $sessionName
     *
     * @return void
     */
    public function delete($sessionName);
}
