<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Collector\Creator;

use Silex\Application;

interface ResourceCreatorInterface
{
    /**
     * @return string
     */
    public function getType();

    /**
     * @param \Silex\Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data);
}
