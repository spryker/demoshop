<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Filter;

use Behat\Gherkin\Node\ScenarioInterface;

/**
 * Filter interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface FilterInterface extends FeatureFilterInterface
{

    /**
     * Checks if scenario or outline matches specified filter.
     *
     * @param \Behat\Gherkin\Node\ScenarioInterface $scenario Scenario or Outline node instance
     *
     * @return Boolean
     */
    public function isScenarioMatch(ScenarioInterface $scenario);

}
