<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Checkout\Wizard;

use Pyz\Yves\Checkout\Wizard\Steps\StepInterface;

class StepConfiguration
{

    /**
     * @var StepInterface
     */
    protected $step;

    /**
     * @var string
     */
    protected $escapeRoute;

    /**
     * @param StepInterface $step
     * @param string $escapeRoute
     */
    public function __construct(StepInterface $step, $escapeRoute)
    {
        $this->step = $step;
        $this->escapeRoute = $escapeRoute;
    }

    /**
     * @return StepInterface
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * @return string
     */
    public function getEscapeRoute()
    {
        return $this->escapeRoute;
    }

}
