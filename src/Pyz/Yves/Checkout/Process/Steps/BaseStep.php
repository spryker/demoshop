<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Process\Steps;

class BaseStep
{

    /**
     * @var string
     */
    protected $stepRoute;

    /**
     * @var string
     */
    protected $escapeRoute;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     *
     */
    public function __construct($stepRoute, $escapeRoute)
    {
        $this->stepRoute = $stepRoute;
        $this->escapeRoute = $escapeRoute;
    }

    /**
     * @return string
     */
    public function getStepRoute()
    {
        return $this->stepRoute;
    }

    /**
     * @return string
     */
    public function getEscapeRoute()
    {
        return $this->escapeRoute;
    }

}
