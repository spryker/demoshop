<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Node;

/**
 * Gherkin step container interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface StepContainerInterface extends NodeInterface
{

    /**
     * Checks if container has steps.
     *
     * @return Boolean
     */
    public function hasSteps();

    /**
     * Returns container steps.
     *
     * @return \Behat\Gherkin\Node\StepNode[]
     */
    public function getSteps();

}
