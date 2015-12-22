<?php

/**
 * (c) Spryker Systems GmbH copyright protected
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
     * @param Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data);

}
