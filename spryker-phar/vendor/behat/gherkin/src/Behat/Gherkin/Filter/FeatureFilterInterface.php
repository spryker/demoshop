<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Behat\Gherkin\Filter;

use Behat\Gherkin\Node\FeatureNode;

/**
 * Feature filter interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface FeatureFilterInterface
{

    /**
     * Checks if Feature matches specified filter.
     *
     * @param \Behat\Gherkin\Node\FeatureNode $feature Feature instance
     *
     * @return Boolean
     */
    public function isFeatureMatch(FeatureNode $feature);

    /**
     * Filters feature according to the filter and returns new one.
     *
     * @param \Behat\Gherkin\Node\FeatureNode $feature
     *
     * @return \Behat\Gherkin\Node\FeatureNode
     */
    public function filterFeature(FeatureNode $feature);

}
