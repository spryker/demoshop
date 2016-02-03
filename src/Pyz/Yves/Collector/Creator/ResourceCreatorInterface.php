<?php

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
