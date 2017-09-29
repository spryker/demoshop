<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Filter;

use Behat\Gherkin\Node\FeatureNode;

/**
 * Abstract filter class.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
abstract class SimpleFilter implements FilterInterface
{

    /**
     * Filters feature according to the filter.
     *
     * @param \Behat\Gherkin\Node\FeatureNode $feature
     *
     * @return \Behat\Gherkin\Node\FeatureNode
     */
    public function filterFeature(FeatureNode $feature)
    {
        if ($this->isFeatureMatch($feature)) {
            return $feature;
        }

        $scenarios = [];
        foreach ($feature->getScenarios() as $scenario) {
            if (!$this->isScenarioMatch($scenario)) {
                continue;
            }

            $scenarios[] = $scenario;
        }

        return new FeatureNode(
            $feature->getTitle(),
            $feature->getDescription(),
            $feature->getTags(),
            $feature->getBackground(),
            $scenarios,
            $feature->getKeyword(),
            $feature->getLanguage(),
            $feature->getFile(),
            $feature->getLine()
        );
    }

}
