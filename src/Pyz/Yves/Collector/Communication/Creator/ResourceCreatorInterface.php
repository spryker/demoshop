<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Collector\Communication\Creator;

use Silex\Application;

interface ResourceCreatorInterface
{

    /**
     * @return string
     */
    public function getType();

    /**
     * @param Application $app
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $app, array $data);

}
