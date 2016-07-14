<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business\Updater;

use Pyz\Zed\Importer\Business\Importer\ImporterInterface;

interface UpdaterInterface extends ImporterInterface
{

    /**
     * @return void
     */
    public function afterUpdate();

    /**
     * @return void
     */
    public function beforeUpdate();

    /**
     * @param array $data
     *
     * @return void
     */
    public function update(array $data);

    /**
     * @return bool
     */
    public function isUpdated();

    /**
     * @return string
     */
    public function getTitle();

}
