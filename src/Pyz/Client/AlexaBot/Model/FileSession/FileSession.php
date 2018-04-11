<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\AlexaBot\Model\FileSession;

class FileSession implements FileSessionInterface
{
    /**
     * @param string $sessionName
     * @param string $data
     *
     * @return void
     */
    public function write($sessionName, $data)
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . $sessionName;
        $fp = fopen($filePath, "w");
        fwrite($fp, $data);
        fclose($fp);
    }

    /**
     * @param $sessionName
     *
     * @return string
     */
    public function read($sessionName)
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . $sessionName;

        return file_get_contents($filePath);
    }

    /**
     * @param string $sessionName
     *
     * @return void
     */
    public function delete($sessionName)
    {
        $filePath = getcwd() . DIRECTORY_SEPARATOR . $sessionName;
        $fp = fopen($filePath, "w");
        fwrite($fp, '');
        fclose($fp);
    }
}
